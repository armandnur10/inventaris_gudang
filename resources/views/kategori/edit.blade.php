@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Kategori</div>
                <div class="card-body">
                    <form action="{{route('kategori.update', $kategori->id)}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon">Nama Kategori</span>
                            <input type="text" name="nama_kategori" value="{{$kategori->nama_kategori}}" class="form-control" placeholder="nama kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
