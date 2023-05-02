@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data PIC Ruangan</div>
                <div class="card-body">
                    <form action="{{route('user.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama Lengkap</span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="nama lengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Username</span>
                                    </div>
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Email</span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Password</span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon">Nama Kategori</span>
                            </div>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="nama kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                        </div> -->
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">Data kategori</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-strip" id="myTable">
                            <thead>
                                <th>Nama</th>
                                <th>Nomor</th>
                                <th>pilihan</th>

                            </thead>
                            <tbody>
                                @foreach ($user as $row)
                                @if($row-> level == 'pic')
                                <tr>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>
                                        <form action="{{route('user.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda akan menghapus data {{$row->name}}')">Hapus</button>
                                            <a href="{{route('user.edit', $row->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('user.show', $row->id)}}" class="btn btn-warning">Detail</a>
                                        </form>

                                    </td>
                                </tr>
                                @endif

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
