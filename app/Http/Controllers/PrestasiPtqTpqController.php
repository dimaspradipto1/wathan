<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\PrestasiPtqTpq;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PrestasiPtqTpqExport;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class PrestasiPtqTpqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = PrestasiPtqTpq::query();
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('siswa.nama', function($item){
                return $item->siswa->nama;
            })
            ->addColumn('tanggal', function($item){
                return Carbon::parse($item->tanggal)->translatedFormat('d-m-Y');
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
                    <a href="'.route('prestasiptqtpq.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <form action="'.route('prestasiptqtpq.destroy', $item->id).'" class="d-inline" method="POST">
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
        return view('pages.prestasiPtqtpq.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $surat = Surat::all();
        return view('pages.prestasiPtqtpq.create', compact('siswa', 'surat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['siswa_id'] = $request->siswa_id;
        $data['tanggal'] = $request->tanggal;
        $data['surat_id'] = $request->surat_id;
        $data['ayat'] = $request->ayat;
        $data['nilai'] = $request->nilai;
        $data['tugas'] = $request->tugas;
        PrestasiPtqTpq::create($data);
        Alert::success('success', 'data berhasil ditambahkan')->autoclose(2000)->toToast();
        return redirect(route('prestasiptqtpq.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PrestasiPtqTpq $prestasiPtqTpq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrestasiPtqTpq $prestasiptqtpq)
    {
        $siswa = Siswa::all();
        $surat = Surat::all();
        return view('pages.prestasiPtqtpq.edit', compact('prestasiptqtpq', 'siswa', 'surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrestasiPtqTpq $prestasiptqtpq)
    {
        $prestasiptqtpq->update($request->all());
        Alert::success('success', 'data berhasil diubah')->autoclose(2000)->toToast();
        return redirect(route('prestasiptqtpq.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrestasiPtqTpq $prestasiptqtpq)
    {
        $prestasiptqtpq->delete();
        Alert::success('success', 'data berhasil dihapus')->autoclose(2000)->toToast();
        return redirect(route('prestasiptqtpq.index'));
    }

    public function export_prestasiptqtpq()
    {
        return Excel::download(new PrestasiPtqTpqExport, 'LEMBAR PRESTASI PTQ DAN TPQ.xlsx');
    }
}
