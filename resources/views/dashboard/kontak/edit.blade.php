@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Kontak</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/kontak/{{ $kontak->id }}/update" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('link') ? ' has-error': '' }}">
                <label for="link">Link Kontak</label>
                <input type="text" id="link" name="link" class="form-control form-control-user"
                       value="{{ $kontak->link }}" placeholder="Masukan Link Kontak" required>
                @if($errors->has('link'))
                    <span class="help-block">{{ $errors->first('link') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('kontak') ? ' has-error': '' }}">
                <label for="kontak">Nama Kontak</label>
                <input type="text" id="kontak" name="kontak" class="form-control form-control-user"
                       value="{{ $kontak->kontak }}" placeholder="Masukan Nama Kontak" required>
                @if($errors->has('link'))
                    <span class="help-block">{{ $errors->first('kontak') }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <a href="/admin/kontak" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
