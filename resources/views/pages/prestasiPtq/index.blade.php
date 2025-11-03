@extends('layouts.dashboard.template')

@push('script')
    <script>
      var dataTable = $('#crudTable').DataTable({
        ajax: {
          url: '{!!url()->current()!!}',
        },
        columns: [
          {data:'DT_RowIndex', name:'DT_RowIndex', class:'text-center'},
          {data:'tanggal', name:'tanggal'},
          {data:'siswa.nama', name:'siswa.nama'},
          {data:'surat.nama_surah', name:'surat.nama_surah'},
          {data:'ayat', name:'ayat'},
          {data:'nilai', name:'nilai'},
          {data:'tugas', name:'tugas'},
          {data:'action', name:'acation'}
        ]
      })
    </script>
@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3 class="text-uppercase">lembar prestasi PTQ</h3>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">prestasi</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-header">
             <a href="{{route('prestasiptq.create')}}" class="btn btn-sm btn-success my-2 mx-2 text-uppercase">+ tambah</a>
             <a href="{{route('export-prestasiptq')}}" class="btn btn-sm btn-primary my-2 mx-2 text-uppercase">export excel</a>
          </div>

          <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            </div>
          </div>
          <div class="card-body">
              <table class="table table-striped" id="crudTable">
                  <thead>
                      <tr>
                          <th class="text-uppercase text-center">no</th>
                          <th class="text-uppercase">tanggal</th>
                          <th class="text-uppercase">siswa</th>
                          <th class="text-uppercase">surat</th>
                          <th class="text-uppercase">ayat</th>
                          <th class="text-uppercase">nilai</th>
                          <th class="text-uppercase">tugas</th>
                          <th class="text-uppercase">aksi</th>
                      </tr>
                  </thead>
                  <tbody></tbody>
              </table>
          </div>
      </div>

  </section>
</div>
@endsection