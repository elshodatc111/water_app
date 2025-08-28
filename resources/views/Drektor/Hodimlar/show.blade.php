@extends('layouts.app1')
@section('title','Hodim')
@section('content')
    <div class="pagetitle">
        <h1>Hodim</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('d_hodim') }}">Hodim</a></li>
                <li class="breadcrumb-item active">Hodim haqida</li>
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
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title">Hodim haqida</h3>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Hodim</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['name'] }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Telefon raqam</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['phone'] }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Lavozim</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['type'] }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Email</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['email'] }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Holati</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['status'] }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6 label">Ishga olindi</div>
                            <div class="col-lg-6" style="text-align: right">{{ $user['created_at'] }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title mb-2">Hodim parolini yangilash</h3>
                        <form action="{{ route('d_hodim_password_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="mb-2">
                                <label for="new_password" class="form-label">Yangi parol</label>
                                <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="confirm_password" class="form-label">Yangi parolni takrorlang</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required>
                                @error('confirm_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title">Hodim malumotlarini yangilash</h3>
                        <form action="{{ route('d_hodim_emploes_update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">FIO</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user['name']) }}" required class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon raqam</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', $user['phone']) }}" required class="form-control phone @error('phone') is-invalid @enderror">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Lavozim</label>
                                <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="direktor" {{ old('type', $user['type']) == 'direktor' ? 'selected' : '' }}>Direktor</option>
                                    <option value="meneger" {{ old('type', $user['type']) == 'meneger' ? 'selected' : '' }}>Meneger</option>
                                    <option value="courier" {{ old('type', $user['type']) == 'courier' ? 'selected' : '' }}>Courier</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Holati</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="true" {{ old('status', $user['status']) == 'true' ? 'selected' : '' }}>Active</option>
                                    <option value="false" {{ old('status', $user['status']) == 'false' ? 'selected' : '' }}>Block</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Saqlash</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
