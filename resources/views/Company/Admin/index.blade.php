@extends('layouts.app0')
@section('title','Kompaniyalar')
@section('content')
    <div class="pagetitle">
        <h1>Kompaniyalar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Kompaniyalar</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Barcha Kompaniyalar</h3>
            <div class="accordion accordion-flush" id="faq-group-2">
                <table class="table table-bordered text-center" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kompaniya nomi</th>
                            <th>Reyting</th>
                            <th>Balans</th>
                            <th>Hodimlar soni</th>
                            <th>Maxsulotlar soni</th>
                            <th>Holati</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($Company as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td style="text-align:left;"><a href="{{ route('admin_company_show',$item['id']) }}">{{ $item['name'] }}</a></td>
                                <td>{{ $item['reyting'] }}</td>
                                <td>{{ $item['balance'] }}</td>
                                <td>{{ $item['user_count'] }}</td>
                                <td>{{ $item['item_count'] }}</td>
                                <td>{{ $item['status'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='7' class="text-center">Kompaniyalar mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
