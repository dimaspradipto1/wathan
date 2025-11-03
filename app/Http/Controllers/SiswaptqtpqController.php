<?php

namespace App\Http\Controllers;

use App\Models\Siswaptqtpq;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SiswaptqtpqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Siswaptqtpq::query();
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
                        <a href="' . route('siswaptqtpq.show', $item->id) . '" class="btn btn-sm btn-primary my-2 mx-2" title="Preview"><i class="fa-solid fa-eye"></i> </a>
                       <!-- <a href="' . route('siswaptqtpq.edit', $item->id) . '" class="btn btn-sm btn-warning text-white my-2 mx-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a> -->
                        <form action="' . route('siswaptqtpq.destroy', $item->id) . '" class="d-inline" method="POST">
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
        return view('pages.siswaPtqTpq.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siswaPtqTpq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['siswa_id'] = $request->siswa_id;
        Siswaptqtpq::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('siswaptqtpq.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswaptqtpq $siswaptqtpq)
    {
        $siswa = $siswaptqtpq->siswa;
        return view('pages.siswaPtqTpq.show', compact('siswaptqtpq', 'siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswaptqtpq $siswaptqtpq)
    {
        return view('pages.siswaPtqTpq.edit', compact('siswaptqtpq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswaptqtpq $siswaptqtpq)
    {
        $siswaptqtpq->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('siswaptqtpq.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswaptqtpq $siswaptqtpq)
    {
        $siswaptqtpq->siswa->update(['kegiatan_pondok' => null]);
        $siswaptqtpq->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('siswaptqtpq.index'));
    }
}
