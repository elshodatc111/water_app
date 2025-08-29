@extends('layouts.app1')
@section('title','Balans')

@section('content')
    <div class="pagetitle mb-3">
        <h1>To'lovlar tarixi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('d_balans') }}">Balans</a></li>
                <li class="breadcrumb-item active">To'lovlar tarixi</li>
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
            <h3 class="card-title">To'lovlar tarixi</h3>
            <div class="table-responsive">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>
                                <b>N</b>ame
                            </th>
                            <th>Ext.</th>
                            <th>City</th>
                            <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                            <th>Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Unity Pugh</td>
                            <td>9958</td>
                            <td>Curicó</td>
                            <td>2005/02/11</td>
                            <td>37%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
