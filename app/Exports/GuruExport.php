<?php

namespace App\Exports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Guru::all()->map(function($guru, $index){
            return [
                'id' => $index+1,
                'nama' => $guru->nama,
                'tempat_lahir' => $guru->tempat_lahir,
                'tgl_lahir'=>$guru->tgl_lahir,
                'pendidikan' => $guru->pendidikan,
                'pekerjaan'=>$guru->pekerjaan,
                'alamat'=> $guru->alamat,
                'tmt'=>$guru->tmt
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA GURU',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'PENDIDIKAN',
            'PEKERJAAN',
            'ALAMAT',
            'TAMAT'
        ];
    }
}
