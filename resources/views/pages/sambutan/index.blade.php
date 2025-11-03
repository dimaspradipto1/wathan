@extends('layouts.dashboard.template')

@push('script')
    <script>
      var dataTable = $('#crudTable').DataTable({
        ajax: {
          url: '{!!url()->current()!!}',
        },
        columns: [
          {data:'DT_RowIndex', name:'DT_RowIndex', class:'text-center'},
          {data:'image', name:'image'},
          {data:'deskripsi1', name:'deskripsi1'},
          {data:'nama_pemilik', name:'nama_pemilik'},
          {data:'jabatan', name:'jabatan'},
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
              <h3 class="text-uppercase">kata sambutan</h3>
              <p class="text-subtitle text-muted text-capitalize">data sambutan</p>
          </div>
          <div class="col-12 col-md-6 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">sambutan</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-header">
             <a href="{{route('sambutan.create')}}" class="btn btn-sm btn-success my-2 mx-2">+ tambah</a>
          </div>
          <div class="card-body">
              <table class="table table-striped" id="crudTable">
                  <thead>
                      <tr>
                          <th class="text-uppercase text-center">no</th>
                          <th class="text-uppercase">image</th>
                          <th class="text-uppercase">deskripsi</th>
                          <th class="text-uppercase">nama pemilik</th>
                          <th class="text-uppercase">jabatan</th>
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