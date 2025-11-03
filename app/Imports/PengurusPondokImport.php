<?php

namespace App\Imports;

use App\Models\PengurusPondok;
use Maatwebsite\Excel\Concerns\ToModel;

class PengurusPondokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PengurusPondok([
            'no'=>$row['0'],
            'nama'=>$row['1'],
            'jabatan'=>$row['2'],
            'pendidikan'=>$row['3'],
            'pekerjaan'=>$row['4'],
            'alamat'=>$row['5'],
            'nohp'=>$row['6'],
        ]);
    }
}
