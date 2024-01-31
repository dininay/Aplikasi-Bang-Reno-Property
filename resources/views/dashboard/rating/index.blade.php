@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Rating</h6>
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
    Rating</button>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Tempat</th>
                <th>Rating</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rating as $index => $rating)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $rating->tempat }}</td>
                <td>{{ $rating->rating }}</td>
                <td>
                    <a href="/admin/rating/{{ $rating->id }}/edit" class="btn btn-sm btn-warning shadow-sm mb-3">
                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                    </a>
                    <a href="/admin/rating/{{ $rating->id }}/delete" class="btn btn-sm btn-danger shadow-sm mb-3"
                        onclick="return confirm('Apakah anda ingin menghapus data ({{ $rating->rating }})?')"><i
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rating</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/admin/rating/add" method="POST">
                    @csrf
                    <div class="form-group {{ $errors->has('tempat') ? ' has-error': '' }}">
                        <label>Lokasi Tempat</label>
                        <input type="text" name="tempat" class="form-control form-control-user"
                            value="{{ old('tempat') }}" placeholder="Masukan Lokasi Tempat" required>
                        @if($errors->has('tempat'))
                        <span class="help-block">{{ $errors->first('tempat') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('rating') ? ' has-error': '' }}">
                        <label>Detail Rating</label>
                        <input type="text" name="rating" class="form-control form-control-user"
                            value="{{ old('rating') }}" placeholder="Masukan Detail Rating" required>
                        @if($errors->has('rating'))
                        <span class="help-block">{{ $errors->first('rating') }}</span>
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