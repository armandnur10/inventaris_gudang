@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data PIC Ruangan</div>
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                        <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama Barang</span>
                                    </div>
                                    <input type="text" name="nama_barang" value="{{$barang->nama_barang}}" class="form-control"
                                        placeholder="Nama Barang">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" value="{{$barang->gambar}}" name="gambar" id="inputGroupFile02">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">spek</span>
                                    </div>
                                    <input type="text" name="spek" value="{{$barang->spek}}" class="form-control" placeholder="spek">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">stok</span>
                                    </div>
                                    <input type="text" name="stok" value="{{$barang->stok}}" class="form-control" placeholder="stok">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">satuan</span>
                                    </div>
                                    <input type="text" name="satuan" value="{{$barang->satuan}}" class="form-control" placeholder="satuan">
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama Ruangan</span>
                                    </div>
                                    <select class="custom-select" name="id_ruangan">
                                        <option selected value="{{$barang->ruangan->id}}">{{$barang->ruangan->nama_ruangan}}</option>
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
                                        <option selected value="{{$barang->kategori->id}}">{{$barang->kategori->nama_kategori}}</option>
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
                                    <select class="custom-select"   name="id_user">
                                        <option selected value="{{$barang->users->id}}">{{$barang->users->name}}</option>
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
                                    <select class="custom-select" value="{{$barang->status}}" name="status">
                                        <option selected value="{{$barang->status}}">{{$barang->status}}</option>
                                        <option value="baik">Baik</option>
                                        <option value="rusak">Rusak</option>
                                        <option value="tidak layak">Tidak Layak</option>
                                    </select>
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

            
        </div>
    </div>
</div>
@endsection
