@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Jasa</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/jasa/{{ $jasa->id }}/update" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('jasa') ? ' has-error': '' }}">
                <label for="jasa">Nama Jasa</label>
                <input type="text" id="jasa" name="jasa" class="form-control form-control-user"
                       value="{{ $jasa->jasa }}" placeholder="Masukan Nama Jasa" required>
                @if($errors->has('jasa'))
                    <span class="help-block">{{ $errors->first('jasa') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('harga') ? ' has-error': '' }}">
                <label for="harga">Harga Jasa</label>
                <input type="number" id="harga" name="harga" class="form-control form-control-user"
                       value="{{ $jasa->harga }}" placeholder="Masukan Harga Jasa" required>
                @if($errors->has('harga'))
                    <span class="help-block">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('detail') ? ' has-error': '' }}">
                <label for="detail">Detail Jasa</label>
                <input type="text" id="detail" name="detail" class="form-control form-control-user"
                       value="{{ $jasa->detail }}" placeholder="Masukan Detail Jasa" required>
                @if($errors->has('detail'))
                    <span class="help-block">{{ $errors->first('detail') }}</span>
                @endif
            </div>

            <div class="modal-footer">
                <a href="/admin/jasa" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
