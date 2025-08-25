@extends('layouts.app1')
@section('title','Buyurtmalar')
@section('content')
    <div class="pagetitle">
        <h1>Buyurtmalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Buyurtmalar</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Buyurtmalar</h3>
        </div>
    </div>
@endsection
