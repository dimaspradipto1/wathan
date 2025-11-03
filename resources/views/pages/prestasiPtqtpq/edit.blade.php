@extends('layouts.dashboard.template')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-7 order-md-1 order-last">
                    <h3 class="text-capitalize">form update lembar prestasi PTQ dan TPQ</h3>
                </div>
                <div class="col-12 col-md-5 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">form update lembar prestasi PTQ dan TPQ</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title text-uppercase">form update lembar prestasi PTQ dan TPQ</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="{{ route('prestasiptqtpq.update', $prestasiptqtpq->id) }}"
                                    class="form form-horizontal" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label class="text-capitalize">tanggal</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tanggal"
                                                    value="{{ old('tanggal', $prestasiptqtpq->tanggal) }}" class="form-control"
                                                    placeholder="tanggal">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="text-capitalize">siswa</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="siswa_id" id="" class="form-control">
                                                    <option value="{{ $prestasiptqtpq->siswa_id }}">
                                                        {{ $prestasiptqtpq->siswa->nama }}</option>
                                                    <option value="">pilih</option>
                                                    <option disable>==============</option>
                                                    @foreach ($siswa as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $prestasiptqtpq->siswa_id ? 'selected' : '' }}>
                                                            {{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                           <div class="col-md-4">
                                                <label class="text-capitalize">surat</label>
                                            </div>
                                           <div class="col-md-8 form-group">
                                                <select name="surat_id" id="" class="form-control">
                                                    <option value="{{ $prestasiptqtpq->surat_id }}">
                                                        {{ $prestasiptqtpq->surat->nama_surah }}</option>
                                                    <option value="">pilih</option>
                                                    <option disable>==============</option>
                                                    @foreach ($surat as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $prestasiptqtpq->surat_id ? 'selected' : '' }}>
                                                            {{ $item->nama_surah }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="text-capitalize">ayat</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="ayat"
                                                    value="{{ old('input_ayat', $prestasiptqtpq->ayat) }}" class="form-control"
                                                    placeholder="input ayat">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="text-capitalize">nilai</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="nilai"
                                                    value="{{ old('nilai', $prestasiptqtpq->nilai) }}" class="form-control"
                                                    placeholder="nilai">
                                            </div>

                                            <div class="col-md-4">
                                                <label class="text-capitalize">tugas</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="tugas" id="" class="form-control" placeholder="input tugas">{{ old('tugas', $prestasiptqtpq->tugas) }}</textarea>
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success me-1 mb-1">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    @endsection
