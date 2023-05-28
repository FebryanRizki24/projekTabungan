@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <h2>PEMASUKAN</h2>
                    <h6>Sering Sering yaa</h6>
                </div>

                <div class="card-body">
                    <form action="{{ route('data.store') }}" method="POST">

                        @csrf
                        
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold " for="nama">Nama</label>
                            <select class="form-select" aria-label="Default select example" name="name">
                                @foreach ($dataUser as $d)
                                <option>{{ $d->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input type="text" name="name" class="form-control " id="keterangan" placeholder="Masukkan nama"> --}}
                            @error('name')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold " for="keterangan">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control " id="keterangan" placeholder="Masukkan keterangan pemasukan">
                            @error('keterangan')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold" for="nominal">Nominal</label>
                            <input type="text" name="nominal" class="form-control" id="nominal" placeholder="Masukkan nominal">
                            @error('nominal')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label class="text-gray-900 font-weight-bold" for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="tanggal" placeholder="Masukkan tanggal">
                            @error('tanggal')
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
