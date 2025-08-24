@extends('layouts.app1')
@section('title','Hodimlar')
@section('content')
    <div class="pagetitle">
        <h1>Hodimlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company') }}">Kompaniyalar</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company_show',$id) }}">Kompaniyalar haqida</a></li>
                <li class="breadcrumb-item active">Hodimlar</li>
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
                    <h3 class="card-title">Kompaniya barcha hodimlari</h3>
                    <table class="table table-bordered text-center" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>FIO</th>
                                <th>Telefon raqami</th>
                                <th>Email</th>
                                <th>Lavozimi</th>
                                <th>Holati</th>
                                <th>Change</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Users as $item)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['phone'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td>{{ $item['type'] }}</td>
                                    <td>
                                        @if ($item['status']=='true')
                                            Aktiv
                                        @else
                                            Block
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin_company_hodim_setstade') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-primary px-1 py-0"><i class="bi bi-bootstrap-reboot"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan=7 class="text-center"> Hodimlar mavjud emas.</td>
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
                    <h3 class="card-title">Yangi hodim</h3>
                    <form action="{{ route('admin_company_hodim_creates') }}" method="post">
                        @csrf
                        <input type="hidden" name="company_id" value="{{ $id }}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Hodim FIO</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required >
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Hodim telefon raqami</label>
                            <input type="text" name="phone" id="phone" class="form-control phone @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required >
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Hodim lavozimi</label>
                            <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required >
                                <option value="">Tanlang</option>
                                <option value="direktor" {{ old('type') == 'direktor' ? 'selected' : '' }}>Direktor</option>
                                <option value="currer" {{ old('type') == 'currer' ? 'selected' : '' }}>Kuryer</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Hodim email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary w-100 mt-2" type="submit">Saqlash</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
