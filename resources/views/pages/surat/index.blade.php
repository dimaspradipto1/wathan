@extends('layouts.dashboard.template')

@push('script')
    <script>
      var dataTable = $('#crudTable').DataTable({
        ajax: {
          url: '{!!url()->current()!!}',
        },
        columns: [
          {data:'DT_RowIndex', name:'DT_RowIndex', class:'text-center'},
          {data:'nama_surah', name:'nama_surah'},
          {data:'jumlah_ayat', name:'jumlah_ayat'},
          {data:'action', name:'action'}
        ]
      })
    </script>
@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-6 order-md-1 order-last">
              <h3 class="text-uppercase">Surah Al Quran</h3>
              <p class="text-subtitle text-muted text-capitalize">Data Surah Al Quran</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Surah Al Quran</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-header">
             <a href="{{route('surat.create')}}" class="btn btn-sm btn-success my-2 mx-2">+ tambah</a>
          </div>
          <div class="card-body">
              <table class="table table-striped" id="crudTable">
                  <thead>
                      <tr>
                          <th class="text-uppercase text-center">no</th>
                          <th class="text-uppercase">nama surah</th>
                          <th class="text-uppercase">jumlah ayat</th>
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