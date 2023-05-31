@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{route('submission.update', $submission->id)}}" method="post">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-header">Edit Pengajuan</div>
                <div class="card-body">
                    @if(Auth()->user()->level == 'pic')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon">Nama Barang</span>
                                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang"
                                    value="{{$submission->nama_barang}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon">Pengajuan</span>
                                <input type="text" name="pengajuan" class="form-control" placeholder="Pengajuan"
                                    value="{{$submission->pengajuan}}">
                            </div>
                        </div>
                    </div>
                    @elseif(Auth()->user()->level == 'admin')
                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon">Status Perubahan</span>
                            <select name="status_perubahan" class="form-select" aria-label="Default select example">
                                <option selected>Pilih Status</option>
                                <option value="ditolak">Ditolak</option>
                                <option value="diterima">Diterima</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{route('submission.index')}}" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
