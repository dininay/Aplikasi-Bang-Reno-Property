@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Pesan Kerjasama / Calon Pelanggan</h6>
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
    Data</button>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Whatsapp</th>
                <th>Kategori</th>
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kerjasama as $index => $kerjasama)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kerjasama->nama }}</td>
                <td>{{ $kerjasama->nowa }}</td>
                <td>{{ $kerjasama->kategori }}</td>
                <td>{{ $kerjasama->pesan }}</td>
                <td>
                    <a href="/admin/kerjasama/{{ $kerjasama->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/kerjasama/{{ $kerjasama->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $kerjasama->nama }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/kerjasama/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('nama') ? ' has-error': '' }}">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control form-control-user"
                            value="{{ old('nama') }}" placeholder="Masukan Nama Lengkap" required>
                        @if($errors->has('pesan'))
                        <span class="help-block">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nowa') ? ' has-error': '' }}">
                        <label>No Whatsapp</label>
                        <input type="number" name="nowa" class="form-control form-control-user"
                            value="{{ old('nowa') }}" placeholder="Masukan No Whatsapp" required>
                        @if($errors->has('nowa'))
                        <span class="help-block">{{ $errors->first('nowa') }}</span>
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
                    <div class="form-group {{ $errors->has('pesan') ? ' has-error': '' }}">
                        <label>Pesan</label>
                        <input type="text" name="pesan" class="form-control form-control-user"
                            value="{{ old('pesan') }}" placeholder="Masukan Pesan Lengkap" required>
                        @if($errors->has('pesan'))
                        <span class="help-block">{{ $errors->first('pesan') }}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection