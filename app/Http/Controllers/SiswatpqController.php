<?php

namespace App\Http\Controllers;

use App\Models\Siswatpq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SiswatpqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Siswatpq::query();
            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('siswa.nama', function ($item) {
                    return $item->siswa->nama;
                })
                ->addColumn('siswa.nik', function ($item) {
                    return $item->siswa->nik;
                })
                ->addColumn('siswa.sekolah', function ($item) {
                    return $item->siswa->sekolah;
                })
                ->addColumn('action', function ($item) {
                    $button = '';
                    $button .= '
                    <div class="d-flex align-item-center">
                        <a href="' . route('siswatpq.show', $item->id) . '" class="btn btn-sm btn-primary my-2 mx-2" title="Preview"><i class="fa-solid fa-eye"></i></a>
                        <a href="' . route('siswatpq.edit', $item->id) . '" class="btn btn-sm btn-warning text-white my-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="' . route('siswatpq.destroy', $item->id) . '" class="d-inline" method="POST">
                            ' . csrf_field() . '
                            ' . method_field('delete') . '
                            <button type="submit" class="btn btn-sm btn-danger my-2 mx-2" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                ';
                    return $button;
                })
                ->rawColumns(['action', 'siswa.nama', 'siswa.nik', 'siswa.sekolah'])
                ->make();
        }
        return view('pages.siswaTpq.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siswaTpq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['siswa_id'] = $request->siswa_id;
        Siswatpq::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('siswatpq.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswatpq $siswatpq)
    {
        $siswa = $siswatpq->siswa;
        return view('pages.siswaTpq.show', compact('siswatpq', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswatpq $siswatpq)
    {
        $siswa = $siswatpq->load('siswa')->siswa;
        return view('pages.siswaTpq.edit', compact('siswatpq', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswatpq $siswatpq)
    {
        $siswa = $siswatpq->siswa;
        $siswa->update($request->all());
        $siswatpq->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('siswatpq.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswatpq $siswatpq)
    {
        $siswatpq->siswa->update(['kegiatan_pondok' => null]);
        $siswatpq->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('siswatpq.index'));
    }
}
