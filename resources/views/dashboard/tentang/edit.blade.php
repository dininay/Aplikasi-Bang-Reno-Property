@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Tentang</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/tentang/{{ $tentang->id }}/update" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('tentang') ? ' has-error': '' }}">
                <label for="tentang">Tentang</label>
                <input type="text" id="tentang" name="tentang" class="form-control form-control-user"
                       value="{{ $tentang->tentang }}" placeholder="Masukan Tentang Perusahaan" required>
                @if($errors->has('tentang'))
                    <span class="help-block">{{ $errors->first('tentang') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('judul') ? ' has-error': '' }}">
                <label for="judul">Judul Tagline</label>
                <input type="text" id="judul" name="judul" class="form-control form-control-user"
                       value="{{ $tentang->judul }}" placeholder="Masukan Judul Tagline" required>
                @if($errors->has('judul'))
                    <span class="help-block">{{ $errors->first('judul') }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <a href="/admin/tentang" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
