<?php

namespace App\Exports;

use App\Models\PengurusPondok;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengurusPondokExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PengurusPondok::all()->map(function($pengurusPondok, $index){
            return [
                'no'=>$index+1,
                'nama'=>$pengurusPondok->nama,
                'jabatan'=>$pengurusPondok->jabatan,
                'pendidikan'=>$pengurusPondok->pendidikan,
                'pekerjaan'=>$pengurusPondok->pekerjaan,
                'alamat'=>$pengurusPondok->alamat,
                'nohp'=>$pengurusPondok->nohp,
            ];
        });
    }

    public function  headings(): array
    {
        return [
            'NO',
            'NAMA PENGURUS PONDOK',
            'JABATAN',
            'PENDIDIKAN',
            'PEKERJAAN',
            'ALAMAT',
            'NO HP'
        ];
    }
}
