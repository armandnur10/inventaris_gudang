@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Data kategori</div>

        <div class="table-responsive" style="overflow-x: hidden!important;">
            <table class="table table-hover" id="myTable">
                <thead class="thead-light">
                    <th class="nama_barang">Nama PIC</th>
                    <th class="nama_barang">Nama Barang</th>
                    <th class="pengajuan">Pengajuan</th>
                    <th class="status_perubahan">Status Perubahan</th>
                    <th class=""></th>
                </thead>
                <tbody>
                    @foreach ($submission as $row)
                    @if($row->status_perubahan == 'diproses')
                    <tr>
                        <td>{{$row->nama_pic}}</td>
                        <td>{{$row->nama_barang}}</td>
                        <td>{{$row->pengajuan}}</td>
                        <td>{{$row->status_perubahan}}</td>
                        <td>
                            <a href="{{route('submission.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                    @endif
                    
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
