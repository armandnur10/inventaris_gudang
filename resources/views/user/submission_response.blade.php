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
                    <tr>
                        <td>{{$row->nama_pic}}</td>
                        <td>{{$row->nama_barang}}</td>
                        <td>{{$row->pengajuan}}</td>
                        <td>{{$row->status_perubahan}}</td>
                        <td>
                            <form action="{{route('submission.destroy', $row->id)}}" method="post">
                                @csrf
                                @method('delete')

                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda akan menghapus Pengajuan {{$row->nama_barang}}')">Hapus</button>
                                <a href="{{route('submission.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
