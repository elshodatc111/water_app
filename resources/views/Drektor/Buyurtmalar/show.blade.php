@extends('layouts.app1')
@section('title','Buyurtma')
@section('content')
    <div class="pagetitle">
        <h1>Buyurtma</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Buyurtmalar</a></li>
                <li class="breadcrumb-item active">Buyurtma</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


@endsection
