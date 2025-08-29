@extends('layouts.app1')
@section('title','Sozlamalar')

@section('content')
    <div class="pagetitle">
        <h1>Sozlamalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_setting') }}">Sozlamalar</a></li>
                <li class="breadcrumb-item active">Admin haqida</li>
            </ol>
        </nav>
    </div>

    {{-- Success / Error xabarlari --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif


@endsection
