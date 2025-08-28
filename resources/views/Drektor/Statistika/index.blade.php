@extends('layouts.app1')
@section('title','Statistika')
@section('content')
    <div class="pagetitle">
        <h1>Statistika</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Statistika</li>
            </ol>
        </nav>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Kunlik buyurtmalar</h3>
                    <div id="kunlikBuyurtma"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#kunlikBuyurtma"), {
                                series: [44, 55, 13,],
                                chart: {
                                    height: 350,
                                    type: 'pie',
                                    toolbar: {show: true}
                                },
                                labels: ['Yangi buyurtmalar', 'Yetqazilgan buyurtmalar', 'Yakunlangan buyurtmalar']
                            }).render();
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Oylik buyurtmalar</h3>
                    <div id="oylikBuyurtma"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#oylikBuyurtma"), {
                                series: [44, 55, 13,],
                                chart: {
                                    height: 350,
                                    type: 'pie',
                                    toolbar: {show: true}
                                },
                                labels: ['Yangi buyurtmalar', 'Yetqazilgan buyurtmalar', 'Yakunlangan buyurtmalar']
                            }).render();
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Kunlik Statistika</h3>
            <div id="kunlikBuyurtma2"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#kunlikBuyurtma2"), {
                        series: [{
                        name: 'Yetqazildi',
                        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                        name: 'Bekor qilingan',
                        data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                        }],
                        chart: {
                        type: 'bar',
                        height: 350
                        },
                        plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                        },
                        colors: ['#28a745', '#dc3545'], // 1-seriya (Yetqazildi) yashil, 2-seriya (Bekor qilingan) qizil
                        dataLabels: {
                        enabled: false
                        },
                        stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                        },
                        xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                        },
                        yaxis: {
                        title: {
                            text: 'Oylik buyurtmalar'
                        }
                        },
                        fill: {
                        opacity: 1
                        },
                        tooltip: {
                        y: {
                            formatter: function(val) {
                            return val + " ta"
                            }
                        }
                        }
                    }).render();
                });
              </script>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Oylik Statistika</h3>
            <div id="oylikStatistika"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#oylikStatistika"), {
                        series: [{
                        name: 'Yetqazildi',
                        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
                        }, {
                        name: 'Bekor qilingan',
                        data: [76, 85, 101, 98, 87, 105, 91, 114, 94],
                        }],
                        chart: {
                        type: 'bar',
                        height: 350
                        },
                        plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            endingShape: 'rounded'
                        },
                        },
                        colors: ['#28a745', '#dc3545'], // 1-seriya (Yetqazildi) yashil, 2-seriya (Bekor qilingan) qizil
                        dataLabels: {
                        enabled: false
                        },
                        stroke: {
                        show: true,
                        width: 2,
                        colors: ['transparent']
                        },
                        xaxis: {
                        categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                        },
                        yaxis: {
                        title: {
                            text: 'Oylik buyurtmalar'
                        }
                        },
                        fill: {
                        opacity: 1
                        },
                        tooltip: {
                        y: {
                            formatter: function(val) {
                            return val + " ta"
                            }
                        }
                        }
                    }).render();
                });
              </script>
        </div>
    </div>
@endsection
