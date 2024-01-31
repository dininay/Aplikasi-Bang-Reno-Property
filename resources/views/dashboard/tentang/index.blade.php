@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Tentang</h6>
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
    Tentang</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tentang</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tentang as $index => $tentang)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $tentang->tentang }}</td>
                <td>{{ $tentang->judul }}</td>
                <td>
                    <a href="/admin/tentang/{{ $tentang->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/tentang/{{ $tentang->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $tentang->tentang }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tentang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/tentang/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('tentang') ? ' has-error': '' }}">
                        <label>Data Tentang</label>
                        <input type="text" name="tentang" class="form-control form-control-user"
                            value="{{ old('tentang') }}" placeholder="Masukan Data Tentang" required>
                        @if($errors->has('tentang'))
                        <span class="help-block">{{ $errors->first('tentang') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('judul') ? ' has-error': '' }}">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control form-control-user"
                            value="{{ old('judul') }}" placeholder="Masukan Data Judul" required>
                        @if($errors->has('judul'))
                        <span class="help-block">{{ $errors->first('judul') }}</span>
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