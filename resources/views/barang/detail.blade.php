@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               <div class="card-header d-flex justify-content-between align-items-center">
                    Detail Barang
                    <a href="{{route('barang.edit', $barang->id)}}" class="btn btn-warning">Edit</a>
                </div>
                <table class="table table-responsive">
                    <tr>
                        <th>Nama Barang</th>
                        <td>:</td>
                        <td>{{$barang->nama_barang}}</td>
                    </tr>
                    <tr>
                        <th>Photo barang</th>
                        <td>:</td>
                        <td>
                            <img src="{{asset('storage/images/barang/'.$barang->gambar)}}" style="width: 100px;height:100px;"
                                class="m-3 rounded object-fit-cover" alt="">
                        </td>
                    </tr>
                    <tr>
                        <th>Spek</th>
                        <td>:</td>
                        <td>{{$barang->spek}}</td>
                    </tr>
                    <tr>
                        <th>Nama PIC</th>
                        <td>:</td>
                        <td>{{$barang->ruangan->users->name}}</td>
                    </tr>
                    <tr>
                        <th>Ruangan</th>
                        <td>:</td>
                        <td>{{$barang->ruangan->nama_ruangan}}</td>
                    </tr>
                    <tr>
                        <th>kategori</th>
                        <td>:</td>
                        <td>{{$barang->kategori->nama_kategori}}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>:</td>
                        <td>{{$barang->stok}}</td>
                    </tr>
                    <tr>
                        <th>Satuan</th>
                        <td>:</td>
                        <td>{{$barang->satuan}}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:</td>
                        <td>{{$barang->status}}</td>
                    </tr>

                </table>
            </div>


        </div>
    </div>
</div>
@endsection
