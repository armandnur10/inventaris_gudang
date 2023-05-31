@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambahkan Data PIC Ruangan</div>
                <div class="card-body">
                    <form action="{{route('user.update', $user->id)}}" method="post">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Nama Lengkap</span>
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="nama lengkap">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Username</span>
                                    <input type="text" name="username" value="{{$user->username}}"  class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Email</span>
                                    <input type="email" name="email" value="{{$user->email}}"  class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon">Password</span>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="input-group mb-3
                                <span class="input-group-text" id="basic-addon">Nama Kategori</spa
                            <input type="text" name="nama_kategori" class="form-control" placeholder="nama kategori">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                        </div> -->
                    </form>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
