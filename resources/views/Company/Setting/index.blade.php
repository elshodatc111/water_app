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

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">Administratorlar</h3>
                    <table class="table table-bordered text-center" style="font-size: 14px">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>F.I.O</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Holati</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td style="text-align:left"><a href="{{ route('admin_setting_show',$item['id']) }}">{{ $item['name'] }}</a></td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>
                                        @if($item['status']=='true')
                                            Aktiv
                                        @else
                                            Bloklangan
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=5 class="text-center">Administratorlar mavjud emas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h3 class="card-title">Yangi administrator</h3>
                    <form action="{{ route('admin_setting_admin_create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">F.I.O</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon raqam</label>
                            <input type="text" value="+998" class="form-control phone @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
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
