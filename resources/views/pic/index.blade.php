@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data PIC</div>
                <table class="table table-responsive">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{Auth()->user()->name}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td>{{Auth()->user()->username}}</td>
                    </tr>
                    <tr>
                        <th>password</th>
                        <td>:</td>
                        <td>{{Auth()->user()->email}}</td>
                    </tr>

                </table>
            </div>

            <div class="card mt-4">
                <div class="card-header">Penanggung Jawab Ruangan</div>

                <div class="table-responsive">
                    @if($barang)
                    <table class="table table-responsive">
                        <thead class="thead-light">
                            <th class="photo">gambar</th>
                            <th class="nama_barang">Nama Barang</th>
                            <th class="spek">spek</th>
                            <th class="status">status</th>
                            <th class="stok">stok</th>
                            <th class="satuan">satuan</th>
                            <th class="nama_ruangan">Nama Ruangan</th>
                            <th class="nama_kategori">Nama Kategori</th>
                            <th class="action">Action</th>
                        </thead>

                        <tbody>
                            @foreach($barang as $row)
                            @if($row->ruangan->id_user == Auth()->user()->id)
                            <tr>
                                @if($row->gambar == null)
                                <td>
                                    <div class="card d-flex align-items-center justify-content-center"
                                        style="width: 100px;height: 100px;">Kosong</div>
                                </td>
                                @else
                                <td class="photo">
                                    <img src="{{asset('storage/images/barang/'.$row->gambar)}}" class="card"
                                        style="width: 100px;height: 100px;object-fit: cover;" alt="">
                                </td>
                                @endif
                                <td class="nama_barang">
                                    {{$row->nama_barang}}
                                    <p>{{$row->ruangan->nama_ruangan}}</p>

                                </td>
                                <td class="spek">{{$row->spek}}</td>
                                <td class="status">
                                    {{$row->status}}
                                </td>
                                <td class="stok">{{$row->stok}}</td>
                                <td class="satuan">{{$row->satuan}}</td>
                                <td class="nama_ruangan">{{$row->ruangan->nama_ruangan}}</td>
                                <td class="nama_kategori">{{$row->kategori->nama_kategori}}</td>
                                <td class="action"> 
                                    <a href="{{route('barang.edit', $row->id)}}" class="btn btn-success edit ">Edit</a>
                                    <a href="{{route('barang.show', $row->id)}}" class="btn btn-warning my-2">Detail</a>
                                </td>
                            </tr>

                            @endif
                            @endforeach
                        </tbody>


                    </table>
                    @else
                    <div class="alert alert-danger rounded-0">
                        Petugas Belum Menjadi PIC Ruangan
                    </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
