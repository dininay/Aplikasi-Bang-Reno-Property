@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Artikel</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/artikel/{{ $artikel->id }}/update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('judul') ? ' has-error': '' }}">
                <label for="judul">Judul Artikel</label>
                <input type="text" id="judul" name="judul" class="form-control form-control-user"
                       value="{{ $artikel->judul }}" placeholder="Masukan Judul Artikel" required>
                @if($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                <label for="kategori">Kategori</label>
                <select id="kategori" class="form-control" name="kategori" required>
                    <option value="">Pilih Kategori</option>
                    <option value="Renovasi" {{ ($artikel->kategori == 'Renovasi') ? 'selected' : '' }}>Renovasi</option>
                    <option value="Pembangunan" {{ ($artikel->kategori == 'Pembangunan') ? 'selected' : '' }}>Pembangunan</option>
                    <option value="Interior" {{ ($artikel->kategori == 'Interior') ? 'selected' : '' }}>Interior</option>
                    <option value="Lain-lain" {{ ($artikel->kategori == 'Lain-Lain') ? 'selected' : '' }}>Lain-Lain</option>
                </select>
                @if($errors->has('kategori'))
                    <span class="help-block">{{ $errors->first('kategori') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('isi') ? ' has-error': '' }}">
                <label for="isi">Isi Artikel</label>
                <input type="text" id="isi" name="isi" class="form-control form-control-user"
                       value="{{ $artikel->isi }}" placeholder="Masukan Isi Artikel" required>
                @if($errors->has('isi'))
                    <span class="help-block">{{ $errors->first('isi') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('isi2') ? ' has-error': '' }}">
                <label for="isi2">Isi Paragraf 2</label>
                <input type="text" id="isi2" name="isi2" class="form-control form-control-user"
                       value="{{ $artikel->isi2 }}" placeholder="Masukan Isi Artikel Paragraf 2" required>
                @if($errors->has('isi2'))
                    <span class="help-block">{{ $errors->first('isi2') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('isi3') ? ' has-error': '' }}">
                <label for="isi3">Isi Paragraf 3</label>
                <input type="text" id="isi3" name="isi3" class="form-control form-control-user"
                       value="{{ $artikel->isi3 }}" placeholder="Masukan Isi Artikel Paragraf 3" required>
                @if($errors->has('isi3'))
                    <span class="help-block">{{ $errors->first('isi3') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('gambar') ? ' has-error': '' }}">
                <label for="gambar">Gambar Artikel</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
                @if($errors->has('gambar'))
                    <span class="help-block">{{ $errors->first('gambar') }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <a href="/artikel" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
