@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Portofolio</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/portofolio/{{ $portofolio->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('judul') ? ' has-error': '' }}">
                <label for="judul">Judul Portofolio</label>
                <input type="text" id="judul" name="judul" class="form-control form-control-user"
                       value="{{ $portofolio->judul }}" placeholder="Masukan Judul Portofolio" required>
                @if($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                <label for="kategori">Kategori</label>
                <select id="kategori" class="form-control" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Renovasi" {{ ($portofolio->kategori == 'Renovasi') ? 'selected' : '' }}>Renovasi</option>
                    <option value="Pembangunan" {{ ($portofolio->kategori == 'Pembangunan') ? 'selected' : '' }}>Pembangunan</option>
                    <option value="Interior" {{ ($portofolio->kategori == 'Interior') ? 'selected' : '' }}>Interior</option>
                    <option value="Lain-lain" {{ ($portofolio->kategori == 'Lain-Lain') ? 'selected' : '' }}>Lain-Lain</option>
                </select>
                @if($errors->has('kategori'))
                    <span class="help-block">{{ $errors->first('kategori') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('portofolio') ? ' has-error': '' }}">
                <label for="portofolio">Detail Portofolio</label>
                <input type="text" id="portofolio" name="portofolio" class="form-control form-control-user"
                       value="{{ $portofolio->portofolio }}" placeholder="Masukan Detail Portofolio" required>
                @if($errors->has('portofolio'))
                    <span class="help-block">{{ $errors->first('portofolio') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('gambar') ? ' has-error': '' }}">
                <label for="gambar">Gambar Portofolio</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
                @if($errors->has('gambar'))
                    <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <a href="/admin/portofolio" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
