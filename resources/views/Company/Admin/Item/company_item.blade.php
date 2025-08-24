@extends('layouts.app1')
@section('title','Maxsulotlar')
@section('content')
    <div class="pagetitle">
        <h1>Maxsulotlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company') }}">Kompaniyalar</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company_show',$id) }}">Kompaniyalar haqida</a></li>
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
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Maxsulotlar</h3>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Maxsulot rasmi</th>
                                <th>Maxsulot nomi</th>
                                <th>Maxsulot narxi</th>
                                <th>Holati</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($CompanyItem as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid rounded" style="width: 68px;height:68px;"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ number_format($item['price'], 0, '', ' ') }}</td>
                                    <td>
                                        @if ($item['status']=='true')
                                            Aktiv
                                        @else
                                            Block
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin_company_item_setstade') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="company_id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-primary px-1 py-0"><i class="bi bi-bootstrap-reboot"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=6 class="text-center">Maxsulotlar mavjud emas</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Yangi maxsulot</h3>
                    <form action="{{ route('admin_company_item_create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Mahsulot nomi</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Narxi (so'm)</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" min="0" value="{{ old('price') }}" required >
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">
                                Mahsulot rasmi
                                <small class="text-muted">(1080x1080, JPG/PNG, max 2MB)</small>
                            </label>
                            <input type="file" name="image" id="image" accept=".jpg,.jpeg,.png" class="form-control @error('image') is-invalid @enderror" required >
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary w-100" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
