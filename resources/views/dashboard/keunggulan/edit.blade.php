@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Keunggulan</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/keunggulan/{{ $keunggulan->id }}/update" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('keunggulan') ? ' has-error': '' }}">
                <label for="keunggulan">Jenis Keunggulan</label>
                <input type="text" id="keunggulan" name="keunggulan" class="form-control form-control-user"
                       value="{{ $keunggulan->keunggulan }}" placeholder="Masukan Jenis Keunggulan" required>
                @if($errors->has('keunggulan'))
                    <span class="help-block">{{ $errors->first('keunggulan') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('detail') ? ' has-error': '' }}">
                <label for="detail">Detail Keunggulan</label>
                <input type="text" id="detail" name="detail" class="form-control form-control-user"
                       value="{{ $keunggulan->detail }}" placeholder="Masukan Detail Keunggulan" required>
                @if($errors->has('detail'))
                    <span class="help-block">{{ $errors->first('detail') }}</span>
                @endif
            </div>

            <div class="modal-footer">
                <a href="/admin/keunggulan" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
