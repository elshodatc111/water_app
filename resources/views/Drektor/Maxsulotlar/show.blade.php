@extends('layouts.app1')
@section('title','Mahsulot haqida')
@section('content')
    <div class="pagetitle">
        <h1>Mahsulot haqida</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('d_maxsulot') }}">Maxsulotlar</a></li>
                <li class="breadcrumb-item active">Mahsulot haqida</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-center">
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="width: 216px;height:216px">
                </div>
                <div class="card-body">
                    <h4 class="card-title mb-0 pb-0">{{ $item['name'] }}</h4>
                    <p class="p-0 m-0"><b class="p-0 m-0">Narxi:</b> {{ number_format($item['price'], 0, '', ' ') }} so'm</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Mahsulot taxrirlash</h3>
                    <form action="{{ route('d_maxsulot_update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <label for="name">Maxsulot nomi</label>
                        <input type="text" id="name" name="name" class="form-control my-2" value="{{ $item['name'] }}" required>
                        <label for="price">Maxsulot narxi</label>
                        <input type="number" id="price" name="price" class="form-control my-2" value="{{ $item['price'] }}" required>
                        <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Mahsulot rasmini yangilash</h3>
                    <form action="{{ route('d_maxsulot_update_image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <div class="mb-3">
                            <label for="image" class="form-label">Maxsulot rasmi (1080x1080, JPG/PNG, max 512 kB)</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png" required >
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        @error('id')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
