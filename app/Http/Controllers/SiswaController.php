<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\PtqTpq;
use App\Models\siswaptq;
use App\Models\Siswatpq;
use App\Models\Siswaptqtpq;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Siswa::query();

            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($item){
                $button = '';

                $button .= '
                  <div class="d-flex align-item-center">
                    <a href="'.route('siswa.show', $item->id).'" class="btn btn-sm btn-primary my-2 mx-2"><i class="fa-solid fa-eye"></i> preview</a>
                    <a href="'.route('siswa.edit', $item->id).'" class="btn btn-sm btn-warning text-white my-2 mx-2"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                    <form action="'.route('siswa.destroy', $item->id).'" class="d-inline" method="POST">
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
        return view('pages.siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nik' => 'required|numeric',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'sekolah' => 'required|string|max:255',
            'kegiatan_pondok' => 'required|string|max:255',
            'kegiatan_tambahan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        // Menyiapkan data siswa
        $data = [
            'nik' => $request->nik,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'sekolah' => $request->sekolah,
            'kegiatan_pondok' => $request->kegiatan_pondok,
            'kegiatan_tambahan' => $request->kegiatan_tambahan,
            'alamat' => $request->alamat
        ];

        // Membuat siswa baru
        $siswa = Siswa::create($data);

        // Cek kegiatan pondok dan buat relasi yang sesuai
        $kegiatanPondok = $request->kegiatan_pondok;

        // Jika kegiatan pondok adalah 'PTQ (Tahfiz Quran)', buat relasi Siswaptq
        if ($kegiatanPondok == 'PTQ (Tahfiz Quran)') {
            Siswaptq::create([
                'siswa_id' => $siswa->id,
                'kegiatan_pondok' => $kegiatanPondok
            ]);
        }

        // Jika kegiatan pondok adalah 'TPQ (Taman Pendidikan Quran)', buat relasi Siswatpq
        elseif ($kegiatanPondok == 'TPQ (Taman Pendidikan Quran)') {
            Siswatpq::create([
                'siswa_id' => $siswa->id,
                'kegiatan_pondok' => $kegiatanPondok
            ]);
        }

        // Jika kegiatan pondok adalah 'PTQ dan TPQ', buat keduanya
        elseif ($kegiatanPondok == 'PTQ dan TPQ') {
            // Siswaptq untuk PTQ
            Siswaptqtpq::create([
                'siswa_id' => $siswa->id,
                'kegiatan_pondok' => $kegiatanPondok
            ]);
        }

        // Menambahkan notifikasi sukses menggunakan Alert
        Alert::success('Success', 'Data berhasil ditambahkan')->autoclose(2000)->toToast();

        // Redirect kembali ke halaman daftar siswa
        return redirect(route('siswa.index'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('pages.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('pages.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Controller method update
    // public function update(Request $request, Siswa $siswa)
    // {
    //     // Temukan siswa berdasarkan ID
    //     $siswa = Siswa::findOrFail($siswa->id);

    //     // Update data siswa
    //     $dataToUpdate = $request->only(['nik', 'nama', 'tempat_lahir', 'tgl_lahir', 'sekolah', 'alamat']);
    //     $siswa->update($dataToUpdate);

    //     // Cek jika ada perubahan pada kegiatan_pondok
    //     if ($request->has('kegiatan_pondok')) {
    //         $kegiatanPondok = $request->kegiatan_pondok;

    //         // Jika kegiatan pondok adalah 'PTQ (Tahfiz Quran)', update Siswaptq
    //         if ($kegiatanPondok == 'PTQ (Tahfiz Quran)') {
    //             // Cari atau buat relasi Siswaptq untuk siswa ini
    //             $siswaptq = Siswaptq::where('siswa_id', $siswa->id)->first();
    //             if ($siswaptq) {
    //                 // Update kegiatan_pondok pada Siswaptq
    //                 $siswaptq->update(['kegiatan_pondok' => $kegiatanPondok]);
    //             } else {
    //                 // Jika Siswaptq tidak ada, buat data baru
    //                 Siswaptq::create([
    //                     'siswa_id' => $siswa->id,
    //                     'kegiatan_pondok' => $kegiatanPondok,
    //                 ]);
    //             }
    //         }

    //         // Jika kegiatan pondok adalah 'TPQ (Taman Pendidikan Quran)', update Siswatpq
    //         elseif ($kegiatanPondok == 'TPQ (Taman Pendidikan Quran)') {
    //             // Cari atau buat relasi Siswatpq untuk siswa ini
    //             $siswatpq = Siswatpq::where('siswa_id', $siswa->id)->first();
    //             if ($siswatpq) {
    //                 // Update kegiatan_pondok pada Siswatpq
    //                 $siswatpq->update(['kegiatan_pondok' => $kegiatanPondok]);
    //             } else {
    //                 // Jika Siswatpq tidak ada, buat data baru
    //                 Siswatpq::create([
    //                     'siswa_id' => $siswa->id,
    //                     'kegiatan_pondok' => $kegiatanPondok,
    //                 ]);
    //             }
    //         }

    //         // Jika kegiatan pondok adalah 'PTQ dan TPQ', update satu relasi dengan nilai gabungan
    //         elseif ($kegiatanPondok == 'PTQ dan TPQ') {
    //             // Cari atau buat relasi Siswaptq atau Siswatpq untuk siswa ini (bisa keduanya, atau hanya satu tergantung kebutuhan)
    //             $siswaptq = Siswaptq::where('siswa_id', $siswa->id)->first();
    //             if ($siswaptq) {
    //                 // Update kegiatan_pondok pada Siswaptq dengan gabungan kegiatan PTQ dan TPQ
    //                 $siswaptq->update(['kegiatan_pondok' => 'PTQ dan TPQ']);
    //             } else {
    //                 // Jika Siswaptq tidak ada, buat data baru
    //                 Siswaptq::create([
    //                     'siswa_id' => $siswa->id,
    //                     'kegiatan_pondok' => 'PTQ dan TPQ',
    //                 ]);
    //             }

    //             // Jika ingin memperbarui Siswatpq dengan kegiatan yang sama (opsional)
    //             $siswatpq = Siswatpq::where('siswa_id', $siswa->id)->first();
    //             if ($siswatpq) {
    //                 // Update kegiatan_pondok pada Siswatpq
    //                 $siswatpq->update(['kegiatan_pondok' => 'PTQ dan TPQ']);
    //             } else {
    //                 // Jika Siswatpq tidak ada, buat data baru
    //                 Siswatpq::create([
    //                     'siswa_id' => $siswa->id,
    //                     'kegiatan_pondok' => 'PTQ dan TPQ',
    //                 ]);
    //             }
    //         }
    //     }

    //     // Menambahkan notifikasi sukses menggunakan Alert
    //     Alert::success('Success', 'Data berhasil diubah')->autoclose(2000)->toToast();

    //     // Redirect kembali ke halaman daftar siswa
    //     return redirect(route('siswa.index'));
    // }

    public function update(Request $request, Siswa $siswa)
    {
        // Temukan siswa berdasarkan ID
        $siswa = Siswa::findOrFail($siswa->id);
    
        // Update data siswa
        $dataToUpdate = $request->only(['nik', 'nama', 'tempat_lahir', 'tgl_lahir', 'sekolah', 'alamat', 'kegiatan_pondok']);
        $siswa->update($dataToUpdate);
    
        // Cek jika ada perubahan pada kegiatan_pondok
        if ($request->has('kegiatan_pondok')) {
            $kegiatanPondok = $request->kegiatan_pondok;
    
            // Proses update berdasarkan jenis kegiatan pondok
            $this->updateKegiatanPondok($siswa, $kegiatanPondok);
        }
    
        // Menambahkan notifikasi sukses menggunakan Alert
        Alert::success('Success', 'Data berhasil diubah')->autoclose(2000)->toToast();
    
        // Redirect kembali ke halaman daftar siswa
        return redirect(route('siswa.index'));
    }

    /**
     * Fungsi untuk menangani pembaruan atau pembuatan relasi kegiatan pondok
     */
    private function updateKegiatanPondok(Siswa $siswa, string $kegiatanPondok)
    {
        // Tentukan model yang akan digunakan berdasarkan kegiatan_pondok
        $models = $this->getModelsForKegiatanPondok($kegiatanPondok);

        // Hapus data lama yang tidak relevan untuk siswa ini
        $this->deleteOldModelData($siswa, $models);

        // Loop untuk memperbarui atau membuat data pada model yang sesuai
        foreach ($models as $model) {
            $this->updateOrCreateModel($model, $siswa, $kegiatanPondok);
        }
    }

    /**
     * Fungsi untuk mendapatkan daftar model yang relevan berdasarkan kegiatan_pondok
     */
    private function getModelsForKegiatanPondok(string $kegiatanPondok): array
    {
        switch ($kegiatanPondok) {
            case 'PTQ (Tahfiz Quran)':
                return ['Siswaptq'];
            case 'TPQ (Taman Pendidikan Quran)':
                return ['Siswatpq'];
            case 'PTQ dan TPQ':
                return ['Siswaptqtpq']; // Bisa dua model
            default:
                return [];
        }
    }

    /**
     * Fungsi untuk menghapus data lama yang tidak relevan
     * Menghapus data kegiatan_pondok yang tidak lagi relevan
     */
    private function deleteOldModelData(Siswa $siswa, array $models)
    {
        foreach ($models as $model) {
            // Tentukan model yang relevan
            switch ($model) {
                case 'Siswaptq':
                    $modelInstance = Siswaptq::class;
                    break;
                case 'Siswatpq':
                    $modelInstance = Siswatpq::class;
                    break;
                case 'Siswaptqtpq':
                    $modelInstance = Siswaptqtpq::class;
                    break;
                default:
                    throw new \Exception("Model $model tidak ditemukan.");
            }

            // Hapus data lama jika ada (data yang tidak relevan)
            $modelInstance::where('siswa_id', $siswa->id)->delete();
        }
    }

    /**
     * Fungsi untuk mengupdate atau membuat data pada model tertentu
     * Jika ada data sebelumnya, maka data tersebut akan dihapus
     */
    private function updateOrCreateModel(string $model, Siswa $siswa, string $kegiatanPondok)
    {
        // Tentukan model yang akan digunakan
        switch ($model) {
            case 'Siswaptq':
                $modelInstance = new Siswaptq;
                break;
            case 'Siswatpq':
                $modelInstance = new Siswatpq;
                break;
            case 'Siswaptqtpq':
                $modelInstance = new Siswaptqtpq;
                break;
            default:
                throw new \Exception("Model $model tidak ditemukan.");
        }

        // Cari model yang ada untuk siswa ini
        $existingModel = $modelInstance::where('siswa_id', $siswa->id)->first();

        if ($existingModel) {
            // Hapus kegiatan_pondok sebelumnya sebelum memperbarui
            $existingModel->update(['kegiatan_pondok' => null]);

            // Update kegiatan_pondok pada model yang ditemukan
            $existingModel->update(['kegiatan_pondok' => $kegiatanPondok]);
        } else {
            // Jika model tidak ada, buat data baru
            $modelInstance::create([
                'siswa_id' => $siswa->id,
                'kegiatan_pondok' => $kegiatanPondok,
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        // Delete related siswaptq record
        siswaptq::where('siswa_id', $siswa->id)->delete();

        // Delete siswa record
        $siswa->delete();

        Alert::success('success', 'data berhasil dihapus')->autoclose()->toToast();
        return redirect(route('siswa.index'));
    }

    public function export_siswa()
    {
        return Excel::download(new SiswaExport, 'DATA SISWA.xlsx');
    }

    public function import_siswa(Request $request)
    {
        if(!$request->file('file')){
            return redirect()->back();
        }
        Excel::import(new SiswaExport, $request->file('file'));
        return redirect()->route('guru.index');
    }
}
