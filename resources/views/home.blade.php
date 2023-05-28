@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} --}}
                    <div class="row">
                        <div class="col-xxl-">
                            <h3>Tabel User</h3>
                            <table class="table">
                                <thead>
                                  <tr>
                                    {{-- <th scope="col">Id</th> --}}
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Aksi</th>                                  
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($data as $d)
                                  <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                      <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3{{ $d->id }}" role="button">Hapus</a>
                                    </td>                    
                                  </tr>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal3{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModal3{{ $d->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <h3>Apakah Kamu Yakin Ingin Menghapus Data Ini??</h3>
                                        </div>
                                        <div class="modal-footer">
                                          <form action="{{ route('user.delete',['id'=>$d->id]) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                              <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                        <hr>
                        <div class="col-xxl-">
                            <h3>Tabel Pemasukan</h3>
                            <table class="table">
                                <thead>
                                  <tr>
                                    {{-- <th scope="col">Id</th> --}}
                                    <th scope="col">Nama</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Tanggal</th>  
                                    <th scope="col">Aksi</th>                                     
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($dataPem as $d)
                                  <tr>
                                    {{-- <th scope="row">{{ $d->id }}</th> --}}
                                    <td>{{ $d->name }}</td>
                                    <td>{{ $d->keterangan }}</td>
                                    <td>{{ $d->nominal }}</td>
                                    <td>{{ $d->tanggal }}</td>
                                    <td>
                                      <a class="btn btn-primary" href="{{ route('pemasukan.edit',['id' => $d->id]) }}" role="button">Edit</a>
                                      <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}" role="button">Hapus</a>
                                    </td>                    
                                  </tr>
                                  <!-- Modal -->
                                  <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $d->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <h3>Apakah Kamu Yakin Ingin Menghapus Data Ini??</h3>
                                        </div>
                                        <div class="modal-footer">
                                          <form action="{{ route('pemasukan.delete',['id'=>$d->id]) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                              <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                        <hr>
                        <div class="col-xxl-">
                          <h3>Tabel Pengeluaran</h3>
                          <table class="table">
                              <thead>
                                <tr>
                                  {{-- <th scope="col">Id</th> --}}
                                  <th scope="col">Nama</th>
                                  <th scope="col">Keterangan</th>
                                  <th scope="col">Nominal</th>
                                  <th scope="col">Tanggal</th> 
                                  <th scope="col">Aksi</th>                                   
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($dataPeng as $d)
                                <tr>
                                  {{-- <th scope="row">{{ $d->id }}</th> --}}
                                  <td>{{ $d->name }}</td>
                                  <td>{{ $d->keterangan }}</td>
                                  <td>{{ $d->nominal }}</td>
                                  <td>{{ $d->tanggal }}</td>
                                  <td>
                                    <a class="btn btn-primary" href="{{ route('pengeluaran.edit',['id' => $d->id]) }}" role="button">Edit</a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2{{ $d->id }}" role="button">Hapus</a>
                                  </td>                    
                                </tr>
                                <div class="modal fade" id="exampleModal2{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModal2{{ $d->id }}Label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h3>Apakah Kamu Yakin Ingin Menghapus Data Ini??</h3>
                                      </div>
                                      <div class="modal-footer">
                                        <form action="{{ route('pengeluaran.delete',['id'=>$d->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        <hr>
                        <div class="col-xxl-">
                            <h3>Sisa Saldo</h3>
                            sisa saldo kita = {{ $sisaSaldo }}
                        </div>
                        <hr>
                        <div class="col-xxl-">
                          <h3>List Perjalanan</h3>
                          <table class="table">
                              <thead>
                                <tr>
                                  {{-- <th scope="col">Id</th> --}}
                                  <th scope="col">Nama Lokasi</th>
                                  <th scope="col">Biaya</th>
                                  <th scope="col">Keterangan</th>     
                                  <th scope="col">Aksi</th>                                   
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($dataPer as $d)
                                <tr>
                                  {{-- <th scope="row">{{ $d->id }}</th> --}}
                                  <td>{{ $d->nama }}</td>
                                  <td>{{ $d->biaya }}</td>
                                  <td>@if ($sisaSaldo >= $d->biaya)
                                      berangkat
                                  @else
                                      nabung lagi uangnya belum cukup
                                  @endif</td>
                                  <td>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}" role="button">Hapus</a>
                                  </td>                    
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModal{{ $d->id }}Label" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <h3>Apakah Kamu Yakin Ingin Menghapus Data Ini??</h3>
                                      </div>
                                      <div class="modal-footer">
                                        <form action="{{ route('listPerjalanan.delete',['id'=>$d->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                                            <button type="submit" class="btn btn-primary">Ya, Hapus</button>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </tbody>
                            </table>
                      </div>
                      
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
