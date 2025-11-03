<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Prestasitpq;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PrestasiTpqExport implements FromCollection, WithHeadings, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prestasitpq::all()->map(function($prestasitpq, $index){
            return [
                'no' => $index + 1,
                'nama_siswa' => $prestasitpq->siswa->nama,
                'tanggal' => Carbon::parse($prestasitpq->tanggal)->translatedFormat('d-m-Y'),
                'surat' => $prestasitpq->surat->nama_surah,
                'ayat' => $prestasitpq->ayat,
                'nilai' => $prestasitpq->nilai,
                'tugas' => $prestasitpq->tugas,
            ];
        });
    }

    public function headings(): array
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
        return 'Lembar Prestasi TPQ';
    }
}
