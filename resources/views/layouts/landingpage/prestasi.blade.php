@extends('layouts.landingpage.template')

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown text-uppercase">Prestasi Siswa</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Prestasi Siswa</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Tabel Prestasi Siswa Start -->
<div class="container-fluid" style="margin-top: 6rem; margin-bottom: 6rem;">
    <div class="container">
        <h2 class="text-center mb-4">Daftar Prestasi Siswa</h2>
        <hr>

        <!-- Tabel Start -->
        <table id="prestasiTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">NO</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Nama Siswa</th>
                    <th class="text-center">Surat</th>
                    <th class="text-center">Ayat</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Tugas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d-m-Y') }}</td>
                        <td>{{ $item->siswa->nama }}</td>
                        <td>{{ $item->surat->nama_surah }}</td>
                        <td>{{ $item->ayat }}</td>
                        <td>{{ $item->nilai }}</td>
                        <td>{{ $item->tugas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Tabel End -->
    </div>
</div>
<!-- Tabel Prestasi Siswa End -->

@endsection

@push('style')
<!-- Menyertakan library CSS DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
@endpush

@push('script')
<!-- Menyertakan library jQuery dan DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTable pada tabel
        $('#prestasiTable').DataTable({
            searching: true,  // Mengaktifkan fitur pencarian
            paging: true,     // Mengaktifkan pagination
            ordering: true,   // Mengaktifkan pengurutan kolom
            info: true,       // Menampilkan informasi jumlah data
            pageLength: 10,   // Menentukan jumlah baris yang tampil per halaman
        });
    });
</script>
@endpush
