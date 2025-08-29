@extends('layouts.app1')
@section('title','Sozlamalar')
@section('content')
    <div class="pagetitle">
        <h1>Sozlamalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sozlamalar</li>
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
                    <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded" style="width: 100%;max-height:200px;max-width:200px">
                </div>
                <div class="card-body">
                    <h3 class="card-title pb-1">{{ $item['name'] }}</h3>
                    <table class="table table table-bordered">
                        <tr>
                            <td>Telefon raqam</td>
                            <td style="text-align:right">{{ $item['phone'] }}</td>
                        </tr>
                        <tr>
                            <td>Maxsulot narxi</td>
                            <td style="text-align:right">{{ number_format($item['order_price'], 0, '', ' ') }}</td>
                        </tr>
                        <tr>
                            <td>Reyting</td>
                            <td style="text-align:right">{{ $item['star'] }} ({{ $item['star_count'] }})</td>
                        </tr>
                        <tr>
                            <td>Balans</td>
                            <td style="text-align:right">{{ number_format($item['balance'], 0, '', ' ') }}</td>
                        </tr>
                        <tr>
                            <td>Xizmt narxi</td>
                            <td style="text-align:right">{{ number_format($item['price'], 0, '', ' ') }}</td>
                        </tr>
                        <tr>
                            <td>Ish faoliyati</td>
                            <td style="text-align:right">@if($item['status']=='true') Aktiv @else Bloklangan @endif</td>
                        </tr>
                        <tr>
                            <td colspan=2>{{ $item['description'] }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Ma'lumotlarni yangilash</h3>
                    <form action="{{ route('d_setting_update') }}" method="POST">
                        @csrf 
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <label for="name">Firma nomi</label>
                        <input type="text" name="name" value="{{ $item['name'] }}" required class="form-control my-2">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="phone">Telefon raqam</label>
                        <input type="text" name="phone" value="{{ $item['phone'] }}" required class="form-control my-2 phone">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="order_price">Maxsulot narxi</label>
                        <input type="number" name="order_price" value="{{ $item['order_price'] }}" required class="form-control my-2">
                        @error('order_price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="status">Ish faoliyati</label>
                        <select name="status" id="status" class="form-control my-2" required>
                            <option value="true" {{ $item['status'] == 'true' ? 'selected' : '' }}>Aktiv</option>
                            <option value="false" {{ $item['status'] == 'false' ? 'selected' : '' }}>Bloklash</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <label for="description">Maxsulot haqida</label>
                        <textarea name="description" id="description" required class="form-control my-2" style="height:120px">{{ $item['description'] }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-primary w-100 mt-3">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Rasmni yangilash</div>
                    <form action="{{ route('d_setting_image_update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                        <label for="image">Rasm tanlang (512x512px, .jpg, .png, Max:512KB)</label>
                        <input type="file" name="image" id="image" class="form-control mt-2" required accept=".jpg,.jpeg,.png">
                        @error('image')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-primary w-100 mt-3">Yangilash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
