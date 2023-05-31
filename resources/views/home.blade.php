@extends('layouts.app')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="height: calc(100vh - 11rem);">
    <h1 class="my-3">Halo, {{Auth()->user()->name}}</h1>
    <p class="my-3">Selamat Datang Di Aplikasi Manajemen inventaris Gudang</p>
</div>
@endsection
