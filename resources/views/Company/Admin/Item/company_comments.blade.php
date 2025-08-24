@extends('layouts.app1')
@section('title','Izohlar')
@section('content')
    <div class="pagetitle">
        <h1>Izohlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company') }}">Kompaniyalar</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company_show',$id) }}">Kompaniyalar haqida</a></li>
                <li class="breadcrumb-item active">Izohlar</li>
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
            <h3 class="card-title">sadas</h3>
        </div>
    </div>
@endsection
