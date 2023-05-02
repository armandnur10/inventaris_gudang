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
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama Barang</span>
                                    </div>
                                    <input type="text" name="nama_barang" class="form-control"
                                        placeholder="Nama Barang">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="gambar" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>

                            </div>

                            

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">stok</span>
                                    </div>
                                    <input type="text" name="stok" class="form-control" placeholder="stok">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">satuan</span>
                                    </div>
                                    <input type="text" name="satuan" class="form-control" placeholder="satuan">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama Ruangan</span>
                                    </div>
                                    <select class="custom-select" name="id_ruangan">
                                        <option selected>Choose...</option>
                                        @foreach ($ruangan as $row)
                                        <option value="{{$row->id}}">{{$row->nama_ruangan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Kategori Barang</span>
                                    </div>
                                    <select class="custom-select" name="id_kategori">
                                        <option selected>Choose...</option>
                                        @foreach ($kategori as $row)
                                        <option value="{{$row->id}}">{{$row->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama PIC</span>
                                    </div>
                                    <select class="custom-select" name="id_user">
                                        <option selected>Choose...</option>
                                        @foreach ($user as $row)
                                        @if($row->level == 'pic')
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endif  
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">status</span>
                                    </div>
                                    <select class="custom-select" name="status">
                                        <option selected>Choose...</option>
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>
                                        <option value="tidak layak">Tidak Layak</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">spek</span>
                                    </div>
                                    <textarea type="text" name="spek" class="form-control" placeholder="spek" id="konten"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
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

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-strip" id="myTable">
                            <thead>
                                <th>gambar</th>
                                <th>Nama Barang</th>
                                <th>spek</th>
                                <th>status</th>
                                <th>stok</th>
                                <th>satuan</th>
                                <th>Nama Ruangan</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>

                            </thead>
                            <tbody>
                                @foreach ($barang as $row)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/images/barang/'.$row->gambar)}}" width="100px" height="100px" alt="">
                                    </td>
                                    <td>{{$row->nama_barang}}</td>
                                    <td>{{$row->spek}}</td>
                                    <td>
                                        @if($row->status == 'baik')
                                        <span class="badge badge-primary">{{$row->status}}</span>

                                        @elseif($row->status == 'rusak')
                                        <span class="badge badge-secondary">{{$row->status}}</span>

                                        @elseif($row->status == 'tidak layak')
                                        <span class="badge badge-success">{{$row->status}}</span>
                                        @endif

                                    </td>
                                    <td>{{$row->stok}}</td>
                                    <td>{{$row->satuan}}</td>
                                    <td>{{$row->ruangan->nama_ruangan}}</td>
                                    <td>{{$row->kategori->nama_kategori}}</td>

                                    <td>
                                        <form action="{{route('barang.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda akan menghapus data {{$row->nama_barang}}')">Hapus</button>
                                            <a href="{{route('barang.edit', $row->id)}}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{route('barang.show', $row->id)}}"
                                                class="btn btn-warning">Detail</a>
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
</div>
@endsection
