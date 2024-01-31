@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Jasa</h6>
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
    Jasa</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Jasa</th>
                <th>Harga</th>
                <th>Detail</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jasa as $index => $jasa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $jasa->jasa }}</td>
                <td>Rp. {{ number_format($jasa->harga, 0, ',', '.') }}</td>
                <td>{{ $jasa->detail }}</td>
                <td>
                    <a href="/admin/jasa/{{ $jasa->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/jasa/{{ $jasa->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $jasa->jasa }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jasa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/jasa/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('jasa') ? ' has-error': '' }}">
                        <label>Nama Jasa</label>
                        <input type="text" name="jasa" class="form-control form-control-user"
                            value="{{ old('jasa') }}" placeholder="Masukan Nama Jasa" required>
                        @if($errors->has('jasa'))
                        <span class="help-block">{{ $errors->first('jasa') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('harga') ? ' has-error': '' }}">
                        <label>Harga Jasa</label>
                        <input type="number" name="harga" class="form-control form-control-user"
                            value="{{ old('harga') }}" placeholder="Masukan Harga Jasa" required>
                        @if($errors->has('Harga'))
                        <span class="help-block">{{ $errors->first('harga') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('detail') ? ' has-error': '' }}">
                        <label>Detail Jasa</label>
                        <input type="text" name="detail" class="form-control form-control-user"
                            value="{{ old('detail') }}" placeholder="Masukan Detail Jasa" required>
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