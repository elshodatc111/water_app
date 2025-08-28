@extends('layouts.app1')
@section('title','Hodim')
@section('content')
    <div class="container">
      <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
        <h1>404</h1>
        @if (session('error'))
            <h2>
                {{ session('error') }}
            </h2>
        @endif
      </section>
    </div>
@endsection
