@extends('layouts.app1')
@section('title','Hodimlar')
@section('content')
    <div class="pagetitle">
        <h1>Hodimlar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('d_hodim') }}">Hodimlar</a></li>
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
        <div class="col-lg-8">
            <div class="card">
                <div class="cadr-body">
                    <div class="card-body">
                        <h3 class="card-title">Hodimlar</h3>
                        <table class="table yable-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
