<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengurusPondok;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengurusPondokExport;
use App\Imports\PengurusPondokImport;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PengurusPondokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->query()){
            $query = PengurusPondok::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .='
                    <div class="d-flex align-item-center">
                        <a href="'.route('pengurus-pondok.show', $item->id).'" class="btn btn-sm btn-primary my-2 mx-2"><i class="fa-solid fa-eye"></i> preview</a>
                        <a href="'.route('pengurus-pondok.edit', $item->id).'" class="btn btn-sm btn-warning my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i>  Edit</a>
                        <form action="'.route('pengurus-pondok.destroy', $item->id).'" class="d-inline">
                        '.csrf_field().'
                        '.method_field('delete').'
                        <button type="submit" class="btn btn-sm btn-danger my-2 mx-2">
                          <i class="fa-solid fa-trash"></i> Delete
                        </button>
                        </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action'])
            ->make();
        }
        return view('pages.pengurusPondok.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pengurusPondok.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['nama'] = $request->nama;
        $data['jabatan'] = $request->jabatan;
        $data['pekerjaan'] = $request->pekerjaan;
        $data['pendidikan'] = $request->pendidikan;
        $data['nohp'] = $request->nohp;
        $data['alamat'] = $request->alamat;

        PengurusPondok::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('pengurus-pondok.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PengurusPondok $pengurusPondok)
    {
        return view('pages.pengurusPondok.show', compact('pengurusPondok'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PengurusPondok $pengurusPondok)
    {
        return view('pages.pengurusPondok.edit', compact('pengurusPondok'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PengurusPondok $pengurusPondok)
    {
        $pengurusPondok = PengurusPondok::FindOrFail($pengurusPondok->id);
        $pengurusPondok->update($request->All());

        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return Redirect(route('pengurus-pondok.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PengurusPondok $pengurusPondok)
    {
        $pengurusPondok->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect()->route('pengurus-pondok.index');
    }

    public function export_pengurus_pondok()
    {
        return Excel::download(new PengurusPondokExport, 'DATA PENGURUS PONDOK.xlsx');
    }

    public function import_pengurus_pondok(Request $request)
    {
        if(!$request->file('file')){
            return redirect()->back();
        }
        Excel::import(new PengurusPondokImport, $request->file('file'));
        return redirect()->route('pengurus-pondok.index');
    }
}
