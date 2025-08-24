@extends('layouts.app1')
@section('title','Kompaniyalar Haqida')
@section('content')
    <div class="pagetitle">
        <h1>Kompaniya haqida</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company') }}">Kompaniyalar</a></li>
                <li class="breadcrumb-item active">Kompaniya haqida</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body pt-4">
                    <div class="row g-3">
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_item', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-box"></i>
                                Mahsulotlar
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_hodim', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-people"></i>
                                Hodimlar
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_paymarts', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-credit-card"></i>
                                To'lovlar
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_balans', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-wallet"></i>
                                Balans tarixi
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_orders', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-card-list"></i>
                                Buyurtmalar
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-2 col-sm-6">
                            <a href="{{ route('admin_company_comments', $Company->id ) }}" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-chat-dots"></i>
                                Izohlar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">{{ $Company['name'] }}</h3>
                    <div class="accordion accordion-flush" id="faq-group-2">
                        <div style="text-align:center" class="py-2">
                            <img src="{{ asset($Company['image']) }}" alt="{{ $Company['name'] }}" class="img-fluid rounded" style="width: 200px">
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Telefon raqam</td>
                                <td style="text-align: right">{{ $Company['phone'] }}</td>
                            </tr>
                            <tr>
                                <td>Reyting</td>
                                <td style="text-align: right">{{ $Company['star'] }} ({{ $Company['star_count'] }})</td>
                            </tr>
                            <tr>
                                <td>Balans</td>
                                <td style="text-align: right">{{ number_format($Company['balance'], 0, ',', ' ') }} ({{ $Company['price'] }})</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td style="text-align: right">
                                    @if($Company['status']=='true')
                                    Aktiv
                                    @else
                                    Bloklangan
                                    @endif
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <form action="{{ route('admin_company_status_update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Company->id }}">
                        @if($Company->status == 'true')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-lock"></i> Bloklash
                            </button>
                        @else
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-unlock"></i> Aktivlashtirish
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Malumotlarni yangilash</h3>
                    <div class="accordion accordion-flush" id="faq-group-2">
                        <form action="{{ route('admin_company_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $Company->id }}">
                            <div class="mb-1">
                                <label for="name" class="form-label">Kompaniya nomi</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $Company->name) }}" required class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="phone" class="form-label">Telefon raqami</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $Company->phone) }}" required class="form-control @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="order_price" class="form-label">Maxsulot narxi</label>
                                <input type="number" id="order_price" name="order_price" value="{{ old('order_price', $Company->order_price) }}" required class="form-control @error('order_price') is-invalid @enderror">
                                @error('order_price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="price" class="form-label">Buyurtma narxi</label>
                                <input type="number" id="price" name="price" value="{{ old('price', $Company->price) }}" required class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="description" class="form-label">Maxsulot haqida</label>
                                <textarea id="description" name="description" required class="form-control @error('description') is-invalid @enderror">{{ old('description', $Company->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary w-100 mt-1" type="submit">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-0 pb-1">Kompaniya logotipini yangilash</h3>
                    <form action="{{ route('admin_company_update_image') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $Company['id'] }}">
                        <label for="image" class="my-2">Rasm yangilash (512x512px, max: 512KB)</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="file" name="image" id="image" accept="image/*" required class="form-control @error('image') is-invalid @enderror" >
                                @error('image')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-6">
                                <button class="btn btn-primary w-100" type="submit">Yangilash</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title mb-1 pb-0">Kompaniya balansini to'ldirish</h3>
                    <form action="{{ route('admin_company_paymart_post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $Company['id'] }}">
                        <label for="amount" class="my-1">To'lov summasi</label>
                        <input type="number" name="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount') }}" required>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="paymart_type" class="my-1">To'lov turi</label>
                        <select name="paymart_type" class="form-control @error('paymart_type') is-invalid @enderror" required>
                            <option value="">Tanlang...</option>
                            <option value="naqt" {{ old('paymart_type') == 'naqt' ? 'selected' : '' }}>Naqt</option>
                            <option value="plastik" {{ old('paymart_type') == 'plastik' ? 'selected' : '' }}>Plastik</option>
                        </select>
                        @error('paymart_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <label for="description" class="my-1">To'lov haqida</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-success w-100 mt-1" type="submit"> To'lov qilish </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
