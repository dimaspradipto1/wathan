<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;

class GuruImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Guru([
            'no'=>$row['0'],
            'nama' =>$row['1'],
            'tempat_lahir'=>$row['2'],
            'tgl_lahir'=> $row['3'],
            'pendidikan'=>$row['4'],
            'pekerjaan'=>$row['5'],
            'alamat'=>$row['6'],
            'tmt'=>$row['7'],
        ]);
    }
}
