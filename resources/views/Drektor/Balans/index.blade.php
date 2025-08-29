@extends('layouts.app1')
@section('title','Balans')

@section('content')
    <div class="pagetitle mb-3">
        <h1>Balans</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Balans</li>
            </ol>
        </nav>
    </div>

    {{-- Success Alert --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Yopish"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start border-bottom pb-3 pt-3 mb-3">
                <div>
                    <h5 class="text-success mb-1">
                        <i class="bi bi-wallet2 me-1"></i> Balans: <strong>15,205,555</strong>
                    </h5>
                    <a href="{{ route('d_balans_paymart_history') }}" class="link-secondary small">Barcha to‘lovlar</a>
                </div>
                <div class="text-end">
                    <h5 class="text-primary mb-1">
                        <i class="bi bi-cash-stack me-1"></i> Tarif narxi: <strong>150</strong>
                    </h5>
                    <a href="{{ route('d_balans_order_history') }}" class="link-secondary small">Balans tarixi</a>
                </div>
            </div>
            <h6 class="fw-bold mb-3">
                <i class="bi bi-clock-history me-1"></i> Oxirgi 10 kunlik buyurtmalar
            </h6>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Buyurtma ID</th>
                            <th>Balansdan yechildi</th>
                            <th>Vaqt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="{{ route('d_order_show',1) }}">Buyurtma haqida</a></td>
                            <td>9960</td>
                            <td>2005/02/11</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="">sadasds</a></td>
                            <td>9960</td>
                            <td>2006/03/15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
