@extends('layouts.dashboard.template')

@push('script')
    <script>
      var dataTable = $('#crudTable').DataTable({
        ajax: {
          url: '{!!url()->current()!!}',
        },
        columns: [
          {data:'DT_RowIndex', name:'DT_RowIndex', class:'text-center'},
          {data:'siswa.nik', name:'siswa.nik'},
          {data:'siswa.nama', name:'siswa.nama'},
          {data:'siswa.sekolah', name:'siswa.sekolah'},
          {data:'action', name:'acation'}
        ]
      })
    </script>
@endpush

@section('content')
<div class="page-heading">
  <div class="page-title">
      <div class="row">
          <div class="col-12 col-md-8 order-md-1 order-last">
              <h3 class="text-uppercase">siswa TPQ (Taman Pendidikan Quran)</h3>
              <p class="text-subtitle text-muted text-capitalize">data siswa</p>
          </div>
          <div class="col-12 col-md-4 order-md-2 order-first">
              <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> 
                      <li class="breadcrumb-item active" aria-current="page">siswa tpq</li>
                  </ol>
              </nav>
          </div>
      </div>
  </div>
  <section class="section">
      <div class="card">
          <div class="card-header">
             <a href="{{route('siswatpq.create')}}" class="btn btn-sm btn-success my-2 mx-2">+ tambah</a>
             {{-- <a href="{{route('export-siswa')}}" class="btn btn-sm btn-outline-primary my-2 mx-2">export excel</a> --}}

             <!-- Button Modal -->
            {{-- <button type="button" class="btn btn-sm btn-outline-success my-2 mx-2" data-bs-toggle="modal" data-bs-target="#modal-default"> import excel</button> --}}
          </div>

          {{-- <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <form  action="{{ route('import-siswa') }}" method="POST" enctype="multipart/form-data">
      
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">import data</h5>
                  </div>
                  <div class="modal-body">
       
                    {{ csrf_field() }}
       
                    <label>Pilih file excel</label>
                    <div class="form-group">
                      <input type="file" name="file" required="required">
                    </div>
       
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                  </div>
                </div>
              </form>
            </div>
          </div> --}}

          <div class="card-body">
              <table class="table table-striped" id="crudTable">
                  <thead>
                      <tr>
                          <th class="text-uppercase text-center">no</th>
                          <th class="text-uppercase">nik</th>
                          <th class="text-uppercase">nama siswa</th>
                          <th class="text-uppercase">sekolah</th>
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