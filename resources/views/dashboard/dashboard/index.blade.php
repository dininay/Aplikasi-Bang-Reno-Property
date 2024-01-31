@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Dashboard</h6>
@endsection
@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Tentang Kami</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.tentang.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Keunggulan</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.keunggulan.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Jasa</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.jasa.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Rating</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.rating.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Kontak</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.kontak.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Portofolio</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.portofolio.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Artikel</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Log Activity</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cek Data Pesan</h5>
                        <p class="card-text">Deskripsi singkat tentang card.</p>
                        <a href="" class="btn btn-primary">Ke Halaman Tujuan</a>
                    </div>
                </div>
            </div>
            <!-- Tambahkan card lainnya jika diperlukan -->
            
        </div>
    </div>
@endsection