@extends('layouts.app0')
@section('title','Yangi kompaniya')
@section('content')

<div class="card">
    <div class="card-body">
        <h3 class="card-title">Yangi kompaniya</h3>
        <form action="{{ route('admin_company_create_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Kompaniya nomi</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="phone" class="form-label">Kompaniya telefon raqami</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="order_price" class="form-label">Kompaniya mahsulot narxi</label>
                    <input type="number" id="order_price" name="order_price" value="{{ old('order_price') }}" required class="form-control @error('order_price') is-invalid @enderror">
                    @error('order_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="image" class="form-label">Mahsulot rasmi (512x512px, max: 512KB)</label>
                    <input type="file" id="image" name="image" accept="image/*" required class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 mb-3">
                    <label for="price" class="form-label">Har bir buyurtma narxi</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mahsulot haqida</label>
                <textarea id="description" name="description" required class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary w-100">Yangi kompaniyani saqlash</button>
        </form>
    </div>
</div>

@endsection
