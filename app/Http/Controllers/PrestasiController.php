<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Prestasi::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('siswa.nama', function($item){
                return $item->siswa->nama;
            })
            ->addColumn('action', function($item){
                $button = '';
                $button .= '
                    <div class="d-flex align-item-center">
                        <a href="'.route('prestasi.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        <form action="'.route('prestasi.destroy', $item->id).'" class="d-inline" method="POST">
                            '.csrf_field().'
                            '.method_field('delete').'
                            <button type="submit" class="btn btn-sm btn-danger my-2 mx-2"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action, '])
            ->make();
        }
        return view('pages.prestasi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        return view('pages.prestasi.create', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['siswa_id'] = $request->siswa_id;
        $data['tanggal'] = $request->tanggal;
        $data['surat'] = $request->surat;
        $data['ayat'] = $request->ayat;
        $data['nilai'] = $request->nilai;
        $data['tugas'] = $request->tugas;
        Prestasi::create($data);

        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('prestasi.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
