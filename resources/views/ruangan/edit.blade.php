@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data PIC Ruangan</div>
                <div class="card-body">
                    <form action="{{route('ruangan.update', $ruangan->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nomor</span>
                                    </div>
                                    <input type="text" name="nomor_ruangan" value="{{$ruangan->nomor_ruangan}}" class="form-control"
                                        placeholder="nomor ruangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Nama</span>
                                    </div>
                                    <input type="text" name="nama_ruangan" value="{{$ruangan->nama_ruangan}}" class="form-control"
                                        placeholder="Nama Ruangan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon">Ukuran</span>
                                    </div>
                                    <select class="custom-select" value="{{$ruangan->ukuran}}" name="ukuran">
                                        <option selected>{{$ruangan->ukuran}}</option>
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
                                        <option selected value="{{$ruangan->users->id}}">{{$ruangan->users->name}}</option>
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
                        
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
