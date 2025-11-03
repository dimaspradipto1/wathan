<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Imports\GuruImport;
use GMP;
use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Guru::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .= '
                    <a href="'.route('guru.show', $item->id).'" class="btn btn-sm btn-primary my-2 mx-2"><i class="fa-solid fa-eye"></i> preview</a>
                    <a href="'.route('guru.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="'.route('guru.destroy', $item->id).'" class="d-inline" method="POST">
                    '.csrf_field().'
                    '.method_field('delete').'
                    <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                    <i class="fa-solid fa-trash"></i> Delete
                    </button>
                    </form>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.guru.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['nama'] = $request->nama;
        $data['tempat_lahir'] =$request->tempat_lahir;
        $data['tgl_lahir'] = $request->tgl_lahir;
        $data['pendidikan'] = $request->pendidikan;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['alamat'] = $request->alamat;
        $data['tmt'] = $request->tmt;

        Guru::create($data);

        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('guru.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        return view('pages.guru.show', compact('guru'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        return view('pages.guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $guru = Guru::FindOrFail($guru->id);
        $guru->update($request->all());

        Alert::success('success', 'data berhasil diubah')->autoclose()->toToast();
        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('guru.index'));
    }

    public function export_guru()
    {
        return Excel::download(new GuruExport, 'DATA GURU.xlsx');
    }

    public function import_guru(Request $request)
    {
        if(!$request->file('file')){
            return redirect()->back();
        }
        Excel::import(new GuruImport, $request->file('file'));
        return redirect()->route('guru.index');
    }
}
