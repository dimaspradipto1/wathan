<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\PrestasiPtqTpq;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrestasiPtqTpqExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PrestasiPtqTpq::all()->map(function($prestasiPtqTpq, $index){
            return [
                'no' => $index + 1,
                'tanggal' => Carbon::parse($prestasiPtqTpq->tanggal)->translatedFormat('d-m-Y'),
                'nama_siswa' => $prestasiPtqTpq->siswa->nama,
                'surat' => $prestasiPtqTpq->surat->nama_surah,
                'ayat' => $prestasiPtqTpq->ayat,
                'nilai' => $prestasiPtqTpq->nilai,
                'tugas' => $prestasiPtqTpq->tugas,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NO',
            'TANGGAL',
            'NAMA SISWA',
            'SURAT',
            'AYAT',
            'NILAI',
            'TUGAS',
        ];
    }

    public function title(): string
    {
        return 'Lembar Prestasi PTQ DAN TPQ';
    }
}
