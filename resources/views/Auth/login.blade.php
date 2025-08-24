@extends('layouts.login')

@section('title','Kirish')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3 w-100">
                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Tizimga kirish</h5>
                                </div>

                                {{-- Global xabarlar (success/error) --}}
                                @if (session('status'))
                                    <div class="alert alert-success text-center" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger text-center" role="alert">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                {{-- Server-side validatsiya xatolari ro‘yxati (ixtiyoriy) --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login_post') }}" class="row g-3 needs-validation">
                                    @csrf

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input
                                                type="email"
                                                name="email"
                                                id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}"
                                                required
                                                autofocus
                                                autocomplete="username"
                                            >
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Parol</label>
                                        <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            required
                                            autocomplete="current-password"
                                        >
                                        @error('password')
                                            <div class="invalid-feedback d-block">
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                                {{ old('remember') ? 'checked' : '' }}
                                            >
                                            <label class="form-check-label" for="remember">Eslab qolish</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Kirish</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
