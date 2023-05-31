@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data PIC Ruangan</div>
                <table class="table table-responsive">
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>:</td>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <th>password</th>
                        <td>:</td>
                        <td>{{$user->email}}</td>
                    </tr>

                </table>
            </div>

            <div class="card mt-4">
                <div class="card-header">Penanggung Jawab Ruangan</div>

                <div class="table-responsive">
                    @if($ruangan)
                    <table class="table table-responsive">
                        <thead class="thead-light">
                            <th>Nomor Ruangan</th>
                            <th>Nama Ruangan</th>
                        </thead>

                        <tbody>
                            @foreach($ruangan as $row)
                            <tr>
                                <td>{{$row->nomor_ruangan}}</td>
                                <td>{{$row->nama_ruangan}}</td>
                            </tr>
                        </tbody>
                        @endforeach

                    </table>
                    @else
                    <div class="alert alert-danger rounded-0">
                        Petugas Belum Menjadi PIC Ruangan
                    </div>
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
