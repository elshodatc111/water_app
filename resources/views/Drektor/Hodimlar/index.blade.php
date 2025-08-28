@extends('layouts.app1')
@section('title','Hodimlar')
@section('content')
    <div class="pagetitle">
        <h1>Hodimlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title">Hodimlar</h3>
                        <table class="table table-bordered text-center" style="font-size:14px;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FIO</th>
                                    <th>Telefon raqam</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Lavozim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td style="text-align:left"><a href="{{ route('d_hodim_show',$item['id']) }}">{{ $item['name'] }}</a></td>
                                        <td>{{ $item['phone'] }}</td>
                                        <td>{{ $item['email'] }}</td>
                                        <td>
                                            @if($item['status']=='true')
                                                Aktiv
                                            @else
                                                Bloklangan
                                            @endif
                                        </td>
                                        <td>
                                            @if($item['type']=='direktor')
                                                Drektor
                                            @elseif($item['type']=='meneger')
                                                Meneger
                                            @else
                                                Kurrer
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan=7 class="text-center">Hodimlar mavjud emas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title">Yangi hodim qo'shish</h3>
                        <form action="{{ route('d_hodim_create') }}" method="POST">
                            @csrf 
                            <div class="mb-3">
                                <label for="name" class="form-label">F.I.O</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control @error('name') is-invalid @enderror" placeholder="Ism Familiya">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefon raqam</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone', '+998') }}" required class="form-control phone @error('phone') is-invalid @enderror" placeholder="+998 90 123 4567">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Lavozim</label>
                                <select id="type" name="type" class="form-select @error('type') is-invalid @enderror" required>
                                    <option value="">Tanlang</option>
                                    <option value="direktor" {{ old('type') == 'direktor' ? 'selected' : '' }}>Direktor</option>
                                    <option value="manager" {{ old('type') == 'manager' ? 'selected' : '' }}>Manager</option>
                                    <option value="currer" {{ old('type') == 'currer' ? 'selected' : '' }}>Courier</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" autocomplete="email">
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
    </div>
@endsection
