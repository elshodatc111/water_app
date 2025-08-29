@extends('layouts.app1')
@section('title','Buyurtmalar')
@section('content')
    <div class="pagetitle">
        <h1>Buyurtmalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Buyurtmalar</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body pt-4">
            <ul class="nav nav-tabs d-flex text-center">
                <li class="nav-item flex-fill" role="presentation">
                    <a href="{{ route('d_order') }}" class="nav-link w-100 active" style="font-weight:700">Aktiv buyurtmalar</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a href="{{ route('d_order_pedding') }}" class="nav-link w-100" style="font-weight:700">Yetqazilayotgan buyurtmalar</a>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                    <a href="{{ route('d_order_success') }}" class="nav-link w-100" style="font-weight:700">Yakunlangan buyurtmalar</a>
                </li>
            </ul>
            <div class="my-4">
                <div class="table-responsive">
                    <table class="table datatable table-bordered text-center">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="{{ route('d_order_show',1) }}">Buyurtma haqida</a></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
