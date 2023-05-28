@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h2>LIST PERJALANAN KITA</h2>
                    <h6>Yuk healing</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('dataPer.store') }}" method="POST">

                        @csrf
                        
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold " for="nama">Nama Lokasi</label>
                            <input type="text" class="form-control " id="nama" name="nama" placeholder="Masukkan Nama Lokasi">
                            {{-- <input type="text" name="name" class="form-control " id="keterangan" placeholder="Masukkan nama"> --}}
                            @error('nama')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold " for="keterangan">Biaya</label>
                            <input type="text" name="biaya" class="form-control " id="keterangan" placeholder="Masukkan Biaya Yang Dibutuhkan">
                            @error('keterangan')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
