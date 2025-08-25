@extends('layouts.app1')
@section('title','To\'lovlar')
@section('content')
    <div class="pagetitle">
        <h1>To'lovlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company') }}">Kompaniyalar</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin_company_show',$id) }}">Kompaniyalar haqida</a></li>
                <li class="breadcrumb-item active">To'lovlar</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">To'lovlar</h3>
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>To'lov summasi</th>
                        <th>To'lov turi</th>
                        <th>To'lov haqida</th>
                        <th>To'lov vaqti</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Paymart as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td style="text-align: left">{{ number_format($item['amount'], 0, '', ' ') }} so'm</td>
                            <td>{{ $item['paymart_type'] }}</td>
                            <td style="text-align: left">{{ $item['description'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                    @empty
                            <tr>
                                <td colspan=5 class="text-center">To'lovlar mavjud emas</td>
                            </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
