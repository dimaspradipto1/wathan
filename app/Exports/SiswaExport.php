<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all()->map(function($siswa, $index){
            return [
                'no'=>$index+1,
                'nik'=> $siswa->nik,
                'nama'=>$siswa->nama,
                'tempat_lahir'=>$siswa->tempat_lahir,
                'tgl_lahir'=>$siswa->tgl_lahir,
                'sekolah'=>$siswa->sekolah,
                'alamat'=>$siswa->alamat,
                'kegiatan_pondok'=>$siswa->kegiatan_pondok,
                'kegiatan_tambahan'=>$siswa->kegiatan_tambahan
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA SISWA',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'SEKOLAH',
            'ALAMAT',
            'KEGIATAN PONDOK',
            'KEGIATAN TAMBAHAN'
        ];
    }
}
