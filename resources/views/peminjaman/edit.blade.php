@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Peminjaman</div>
                <div class="card-body">
                    <form method="post" action="{{ route('peminjaman.update', $peminjaman->PeminjamanID) }}">
                        @csrf
                        @method('PUT')

                        <!-- Input untuk Nama Peminjam -->
                        <div class="row mb-3">
                            <label for="NamaPeminjam" class="col-md-4 col-form-label text-md-end">{{ __('Nama Peminjam') }}</label>
                            <div class="col-md-6">
                                <input id="NamaPeminjam" type="text" value="{{ $peminjaman->NamaPeminjam }}" 
                                       class="form-control @error('NamaPeminjam') is-invalid @enderror" 
                                       name="NamaPeminjam" required>
                                
                                @error('NamaPeminjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk Tanggal Peminjaman -->
                        <div class="row mb-3">
                            <label for="TanggalPeminjaman" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Peminjaman') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPeminjaman" type="date" value="{{ $peminjaman->TanggalPeminjaman }}" 
                                       class="form-control @error('TanggalPeminjaman') is-invalid @enderror" 
                                       name="TanggalPeminjaman" required>
                                
                                @error('TanggalPeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Input untuk Tanggal Pengembalian -->
                        <div class="row mb-3">
                            <label for="TanggalPengembalian" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Pengembalian') }}</label>
                            <div class="col-md-6">
                                <input id="TanggalPengembalian" type="date" value="{{ $peminjaman->TanggalPengembalian }}" 
                                       class="form-control @error('TanggalPengembalian') is-invalid @enderror" 
                                       name="TanggalPengembalian" required>
                                
                                @error('TanggalPengembalian')
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
                                    {{ __('Simpan') }}
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
