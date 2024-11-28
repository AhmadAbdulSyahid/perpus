@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Peminjaman</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf

                        <!-- Input untuk ID Peminjaman -->
                        <div class="row mb-3">
                            <label for="peminjaman_id" class="col-md-4 col-form-label text-md-end">{{ __('ID Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="peminjaman_id" type="text" class="form-control @error('peminjaman_id') is-invalid @enderror" 
                                       name="peminjaman_id" value="{{ old('peminjaman_id') }}" required autocomplete="peminjaman_id" autofocus>
                                @error('peminjaman_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk Nama Peminjam -->
                        <div class="row mb-3">
                            <label for="nama_peminjam" class="col-md-4 col-form-label text-md-end">{{ __('Nama Peminjam') }}</label>
                            <div class="col-md-6">
                                <input id="nama_peminjam" type="text" class="form-control @error('nama_peminjam') is-invalid @enderror" 
                                       name="nama_peminjam" value="{{ old('nama_peminjam') }}" required autocomplete="nama_peminjam" autofocus>
                                @error('nama_peminjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk Tanggal Peminjaman -->
                        <div class="row mb-3">
                            <label for="tanggal_peminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="tanggal_peminjaman" type="date" class="form-control @error('tanggal_peminjaman') is-invalid @enderror" 
                                       name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman') }}" required autocomplete="tanggal_peminjaman">
                                @error('tanggal_peminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk Tanggal Pengembalian -->
                        <div class="row mb-3">
                            <label for="tanggal_pengembalian" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Pengembalian') }}</label>
                            <div class="col-md-6">
                                <input id="tanggal_pengembalian" type="date" class="form-control @error('tanggal_pengembalian') is-invalid @enderror" 
                                       name="tanggal_pengembalian" value="{{ old('tanggal_pengembalian') }}" required autocomplete="tanggal_pengembalian">
                                @error('tanggal_pengembalian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Peminjaman') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
