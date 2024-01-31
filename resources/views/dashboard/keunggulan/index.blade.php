@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Keunggulan</h6>
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
    Keunggulan</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Keunggulan</th>
                <th>Detail Keunggulan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($keunggulan as $index => $keunggulan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $keunggulan->keunggulan }}</td>
                <td>{{ $keunggulan->detail }}</td>
                <td>
                    <a href="/admin/keunggulan/{{ $keunggulan->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/keunggulan/{{ $keunggulan->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $keunggulan->nama_keunggulan }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Keunggulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/keunggulan/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('keunggulan') ? ' has-error': '' }}">
                        <label>Jenis Keunggulan</label>
                        <input type="text" name="keunggulan" class="form-control form-control-user"
                            value="{{ old('keunggulan') }}" placeholder="Masukan Jenis Keunggulan" required>
                        @if($errors->has('keunggulan'))
                        <span class="help-block">{{ $errors->first('keunggulan') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('detail') ? ' has-error': '' }}">
                        <label>Detail</label>
                        <input type="text" name="detail" class="form-control form-control-user"
                            value="{{ old('detail') }}" placeholder="Masukan Detail Keunggulan" required>
                        @if($errors->has('detail'))
                        <span class="help-block">{{ $errors->first('detail') }}</span>
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