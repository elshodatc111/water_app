@extends('layouts.app1')
@section('title','Maxsulotlar')
@section('content')
    <div class="pagetitle">
        <h1>Maxsulotlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Maxsulotlar</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @forelse ($items as $item)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header text-center">
                                <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded" style="width: 100%;max-height:250px;max-width:250px;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mb-0 pb-0">{{ $item['name'] }}</h4>
                                <p class="p-0 m-0"><b class="p-0 m-0">Narxi:</b> {{ number_format($item['price'], 0, '', ' ') }} so'm</p>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{ route('d_maxsulot_show',$item['id']) }}" class="btn btn-primary w-100"><i class="bi bi-pencil"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('d_maxsulot_delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button class="btn btn-danger w-100"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Maxsulotlar mavjud emas.</h3>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi maxsulot</h3>
                    <form action="{{ route('d_maxsulot_create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Maxsulot nomi</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Maxsulot narxi</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" required min="0" step="0.01" value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Maxsulot rasmi (1080x1080, JPG/PNG, max 1 MB)</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept=".jpg,.jpeg,.png" required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
