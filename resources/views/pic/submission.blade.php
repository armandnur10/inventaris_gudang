@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Barang</div>
                <div class="card-body">
                    <form action="{{route('submission.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 my-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon">Pengajuan</span>
                                    <input type="text" name="pengajuan" class="form-control" placeholder="Pengajuan">
                                </div>
                            </div>
                            <div class="col-md-6 my-5">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon">Nama Barang</span>
                                    <select class="form-select" name="nama_barang">
                                        <option selected>Choose...</option>
                                        @foreach ($barang as $row)
                                        <option value="{{$row->nama_barang}}">{{$row->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 my-5 d-none">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon">Nama PIC</span>
                                    <input type="text" name="nama_pic" class="form-control"
                                        value="{{Auth()->user()->name}}" placeholder="Pengajuan">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group w-100">
                                    <button type="submit" class="btn btn-primary w-100">Kirim Pengajuan</button>
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
                            <th class="nama_barang">Nama Barang</th>
                            <th class="pengajuan">Pengajuan</th>
                            <th class="status_perubahan">Status Perubahan</th>
                            <th class=""></th>
                        </thead>
                        <tbody>
                            @foreach ($submission as $row)
                            <tr>
                                <td>{{$row->nama_barang}}</td>
                                <td>{{$row->pengajuan}}</td>
                                <td>{{$row->status_perubahan}}</td>
                                <td>
                                    <form action="{{route('submission.destroy', $row->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda akan menghapus Pengajuan {{$row->nama_barang}}')">Hapus</button>
                                        <a href="{{route('submission.edit', $row->id)}}"
                                            class="btn btn-warning">Edit</a>
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
