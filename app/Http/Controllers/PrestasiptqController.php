<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Prestasiptq;
use Illuminate\Http\Request;
use App\Exports\PersteasiPTqExport;
use App\Models\Surat;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PrestasiptqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Prestasiptq::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('siswa.nama', function($item){
                return $item->siswa->nama;
            })
            ->addColumn('tanggal', function($item){
                return Carbon::parse($item->tanggal)->format('d-m-Y');
            })
            ->addColumn('surat.nama_surah', function($item){
                return $item->surat->nama_surah;
            })
            ->addColumn('ayat', function($item){
                return $item->ayat;
            })
            ->addColumn('nilai', function($item){
                return $item->nilai;
            })
            ->addColumn('tugas', function($item){
                return $item->tugas;
            })
            ->addColumn('action', function($item){
                $button = '';
                $button .= '
                    <div class="d-flex align-item-center">
                        <a href="'.route('prestasiptq.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="'.route('prestasiptq.destroy', $item->id).'" class="d-inline" method="POST">
                            '.csrf_field().'
                            '.method_field('delete').'
                            <button type="submit" class="btn btn-sm btn-danger my-2 mx-2" title="Delete"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                ';
                return $button;
            })
            ->rawColumns(['action', 'siswa.nama', 'tanggal', 'surat.nama_surah', 'ayat', 'nilai', 'tugas'])
            ->make();
        }
        return view('pages.prestasiPtq.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $surat = Surat::all();
        return view('pages.prestasiPtq.create', compact('siswa', 'surat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['tanggal'] = $request->tanggal;
        $data['siswa_id'] = $request->siswa_id;
        $data['tanggal'] = $request->tanggal;
        $data['surat_id'] = $request->surat_id;
        $data['ayat'] = $request->ayat;
        $data['nilai'] = $request->nilai;
        $data['tugas'] = $request->tugas;
        Prestasiptq::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('prestasiptq.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasiptq $prestasiptq)
    {
        // return view('pages.prestasiPtq.show', compact('prestasiptq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasiptq $prestasiptq)
    {
        $siswa = Siswa::all();
        $surat = Surat::all();
        return view('pages.prestasiPtq.edit', compact('prestasiptq', 'siswa', 'surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasiptq $prestasiptq)
    {
        $prestasiptq->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('prestasiptq.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasiptq $prestasiptq)
    {
        $prestasiptq->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('prestasiptq.index'));
    }

    public function export_prestasiptq()
    {
        return Excel::download(new PersteasiPTqExport, 'LEMBAR PRESTASI PTQ.xlsx');
    }
}
