@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Barang</div>
                <div class="card-body">
                    <form action="{{route('barang.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Nama Barang</span>
                                        <input type="text" name="nama_barang" class="form-control"
                                            placeholder="Nama Barang">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" name="gambar" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">stok</span>
                                        <input type="text" name="stok" class="form-control" placeholder="stok">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">satuan</span>
                                        <input type="text" name="satuan" class="form-control" placeholder="satuan">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Nama Ruangan</span>
                                        <select class="form-select" name="id_ruangan">
                                            <option selected>Choose...</option>
                                            @foreach ($ruangan as $row)
                                            <option value="{{$row->id}}">{{$row->nama_ruangan}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Kategori Barang</span>
                                        <select class="form-select" name="id_kategori">
                                            <option selected>Choose...</option>
                                            @foreach ($kategori as $row)
                                            <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <div class="col-md-6">



                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">status</span>
                                        <select class="form-select" name="status">
                                            <option selected>Choose...</option>
                                            <option value="baik">Baik</option>
                                            <option value="rusak">Rusak</option>
                                            <option value="tidak layak">Tidak Layak</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-text">Spek</span>
                                        <textarea type="text" name="spek" class="form-control" placeholder="spek"></textarea>
                                    </div>

                                </div>
                            </div>



                            <div class="col-md-6 my-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Data kategori</div>

                <div class="table-responsive" style="overflow-x: hidden!important;">
                    <table class="table table-hover" id="myTable">
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
                            @foreach ($barang as $row)
                            <tr>
                                @if($row->gambar == null)
                                <td>
                                    <div class="card d-flex align-items-center justify-content-center" style="width: 100px;height: 100px;">Kosong</div>
                                </td>
                                @else
                                <td  class="photo">
                                    <img src="{{asset('storage/images/barang/'.$row->gambar)}}" class="card" style="width: 100px;height: 100px;object-fit: cover;" alt="">
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
                                    <form action="{{route('barang.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda akan menghapus data {{$row->nama_barang}}')">Hapus</button>
                                        <a href="{{route('barang.edit', $row->id)}}" class="btn btn-success edit ">Edit</a>
                                        <a href="{{route('barang.show', $row->id)}}" class="btn btn-warning my-2">Detail</a>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
