<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Prestasiptq;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersteasiPTqExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestasiptq::all()->map(function($prestasiptq, $index){
            return [
                'no' => $index + 1,
                'nama_siswa' => $prestasiptq->siswa->nama,
                'tanggal' => Carbon::parse($prestasiptq->tanggal)->translatedFormat('d-m-Y'),
                'surat' => $prestasiptq->surat->nama_surah,
                'ayat' => $prestasiptq->ayat,
                'nilai' => $prestasiptq->nilai,
                'tugas' => $prestasiptq->tugas,
            ];
        });
    }public function headings(): array
    {
        return [
            'NO',
            'NAMA SISWA',
            'TANGGAL',
            'SURAT',
            'AYAT',
            'NILAI',
            'TUGAS',
        ];
    }

    public function title(): string
    {
        return 'Lembar Prestasi PTQ';
    }
}
