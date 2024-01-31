@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Kontak</h6>
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
    Kontak</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Link</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kontak as $index => $kontak)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kontak->link }}</td>
                <td>{{ $kontak->kontak }}</td>
                <td>
                    <a href="/admin/kontak/{{ $kontak->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/kontak/{{ $kontak->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $kontak->kontak }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kontak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/kontak/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('link') ? ' has-error': '' }}">
                        <label>Link Kontak</label>
                        <input type="text" name="link" class="form-control form-control-user"
                            value="{{ old('link') }}" placeholder="Masukan Link Kontak" required>
                        @if($errors->has('link'))
                        <span class="help-block">{{ $errors->first('link') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('kontak') ? ' has-error': '' }}">
                        <label>Nama Kontak</label>
                        <input type="text" name="kontak" class="form-control form-control-user"
                            value="{{ old('kontak') }}" placeholder="Masukan Nama Kontak (ex : Instagram)" required>
                        @if($errors->has('kontak'))
                        <span class="help-block">{{ $errors->first('kontak') }}</span>
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