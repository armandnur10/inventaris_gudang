@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Detail Ruangan</div>
                <div class="card-body">
                    <table class="table">
                       <tr>
                            <th>Nomor Ruangan</th>
                            <td>:</td>
                            <td>{{$ruangan->nomor_ruangan}}</td>
                       </tr>
                       <tr>
                            <th>Nama Ruangan</th>
                            <td>:</td>
                            <td>{{$ruangan->nama_ruangan}}</td>
                       </tr>
                       <tr>
                            <th>Ukuran</th>
                            <td>:</td>
                            <td>{{$ruangan->ukuran}}</td>
                       </tr>
                       <tr>
                            <th>PIC</th>
                            <td>:</td>
                            <td>{{$ruangan->users->name}}</td>
                       </tr>

                    </table>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
