@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data Ruangan</div>
                <div class="card-body">
                    <form action="{{route('ruangan.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama</span>
                                    </div>
                                    <input type="text" name="nama_ruangan" class="form-control"
                                        placeholder="Nama Ruangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Ukuran</span>
                                    </div>
                                    <select class="custom-select" name="ukuran">
                                        <option selected>Choose...</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Penanggung Jawab</span>
                                    </div>
                                    <select class="custom-select" name="id_user">
                                        <option selected>Choose...</option>
                                        @foreach ($user as $row)
                                        @if ($row->level == 'pic')
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endif()
                                        @endforeach
                                    </select>
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
                                <th>Nomor Ruangan</th>
                                <th>Nama Ruangan</th>
                                <th>Ukuran</th>
                                <th>Penanggung Jawab</th>
                                <th>Pilihan</th>

                            </thead>
                            <tbody>
                                @foreach ($ruangan as $row)
                                <tr>
                                    <td>{{$row->nomor_ruangan}}</td>
                                    <td>{{$row->nama_ruangan}}</td>
                                    <td>
                                    @if($row->ukuran == 'small')
                                    <span class="badge badge-primary">{{$row->ukuran}}</span>
                                    
                                    @elseif($row->ukuran == 'medium')
                                    <span class="badge badge-secondary">{{$row->ukuran}}</span>
                                    
                                    @elseif($row->ukuran == 'large')
                                    <span class="badge badge-success">{{$row->ukuran}}</span>
                                    @endif

                                    </td>
                                    <td>{{$row->users->name}}</td>
                                    <td>
                                        <form action="{{route('ruangan.destroy', $row->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda akan menghapus data {{$row->nama_ruangan}}')">Hapus</button>
                                            <a href="{{route('ruangan.edit', $row->id)}}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{route('ruangan.show', $row->id)}}"
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
