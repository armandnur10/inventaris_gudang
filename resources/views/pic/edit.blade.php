@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Barang</div>
                <div class="card-body">
                    <form action="{{route('barang.update', $barang->id)}}" class="row" method="post" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="col-md-6">
                            <div class="input-group mb-3 my-4">
                                <span class="input-group-text" id="basic-addon">stok</span>
                                <input type="number" name="stok" value="{{$barang->stok}}" class="form-control"
                                    placeholder="stok" min="0" max="1000000">
                            </div>
                        </div>
                        <div class="col-md-6 my-4 ">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon">status</span>
                                <select class="form-select" value="{{$barang->status}}" name="status">
                                    <option selected value="{{$barang->status}}">{{$barang->status}}</option>
                                    <option value="baik">Baik</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="tidak layak">Tidak Layak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 my-5">
                            <button type="submit" class="btn btn-primary w-100">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
