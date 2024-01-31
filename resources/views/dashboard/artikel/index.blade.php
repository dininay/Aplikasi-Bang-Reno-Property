@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Artikel</h6>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<button type="button" class="btn btn-sm btn-success shadow-sm mb-3" data-toggle="modal" data-target="#addModal"><i
        class="fas fa-plus fa-sm text-white-50"></i>
    Tambah
    Artikel</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Isi Paragraf 1</th>
                <th>Isi Paragraf 2</th>
                <th>Isi Paragraf 3</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artikel as $index => $artikel)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $artikel->judul }}</td>
                <td>{{ $artikel->kategori }}</td>
                <td>{{ $artikel->isi }}</td>
                <td>{{ $artikel->isi2 }}</td>
                <td>{{ $artikel->isi3 }}</td>
                <td><img src="{{ asset('uploads/' . $artikel->gambar) }}" alt="Gambar Artikel"></td>
                <td>
                    <a href="/admin/artikel/{{ $artikel->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/artikel/{{ $artikel->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $artikel->artikel }})?')"><i
                        class="fas fa-trash fa-sm text-white-50"></i> Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/artikel/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group {{ $errors->has('judul') ? ' has-error': '' }}">
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" class="form-control form-control-user"
                            value="{{ old('judul') }}" placeholder="Masukan Judul Artikel" required>
                        @if($errors->has('judul'))
                        <span class="help-block">{{ $errors->first('judul') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('kategori') ? ' has-error': '' }}">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Renovasi" {{ (old('kategori') == 'Renovasi') ? 'selected' : '' }}>Renovasi</option>
                            <option value="Pembangunan" {{ (old('kategori') == 'Pembangunan') ? 'selected' : '' }}>Pembangunan</option>
                            <option value="Interior" {{ (old('kategori') == 'Interior') ? 'selected' : '' }}>Interior</option>
                            <option value="Lain-lain" {{ (old('kategori') == 'Lain-lain') ? 'selected' : '' }}>Lain-Lain
                            </option>
                        </select>
                        @if($errors->has('kategori'))
                        <span class="help-block">{{ $errors->first('kategori') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('isi') ? ' has-error': '' }}">
                        <label>Isi Artikel</label>
                        <input type="text" name="isi" class="form-control form-control-user"
                            value="{{ old('isi') }}" placeholder="Masukan Detail Isi Artikel" required>
                        @if($errors->has('isi'))
                        <span class="help-block">{{ $errors->first('isi') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('isi2') ? ' has-error': '' }}">
                        <label>Isi Artikel Paragraf 2</label>
                        <input type="text" name="isi2" class="form-control form-control-user"
                            value="{{ old('isi2') }}" placeholder="Masukan Detail Isi Artikel Paragraf 2" required>
                        @if($errors->has('isi2'))
                        <span class="help-block">{{ $errors->first('isi2') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('isi3') ? ' has-error': '' }}">
                        <label>Isi Artikel Paragraf 3</label>
                        <input type="text" name="isi3" class="form-control form-control-user"
                            value="{{ old('isi3') }}" placeholder="Masukan Detail Isi Artikel Paragraf 3" required>
                        @if($errors->has('isi3'))
                        <span class="help-block">{{ $errors->first('isi3') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('gambar') ? ' has-error': '' }}">
                        <label>Gambar Artikel</label>
                        <input type="file" name="gambar" accept="image/*" required>
                        @if($errors->has('gambar'))
                        <span class="help-block">{{ $errors->first('gambar') }}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection