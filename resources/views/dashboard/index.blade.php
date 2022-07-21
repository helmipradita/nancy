@extends('dashboard.layouts.base')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Halo Selamat Datang <b>{{ Auth::user()->name }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                          
                                        <div class="info-box-content">
                                          <span class="info-box-text">Jumlah Produk</span>
                                          <span class="info-box-number">
                                            10
                                          </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                          
                                        <div class="info-box-content">
                                          <span class="info-box-text">Jumlah Produk</span>
                                          <span class="info-box-number">
                                            10
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection