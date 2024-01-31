@extends('dashboard.layout.master')

@section('title_content')
    <h6 class="m-0 font-weight-bold text-primary">Edit Rating</h6>
@endsection

@section('content')
    @if(session('status'))
        <div class="alert alert-info" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="modal-body">
        <form action="/admin/rating/{{ $rating->id }}/update" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('tempat') ? ' has-error': '' }}">
                <label for="tempat">Lokasi Tempat</label>
                <input type="text" id="tempat" name="tempat" class="form-control form-control-user"
                       value="{{ $rating->tempat }}" placeholder="Masukan Lokasi Tempat" required>
                @if($errors->has('tempat'))
                    <span class="help-block">{{ $errors->first('tempat') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('rating') ? ' has-error': '' }}">
                <label for="rating">Rating</label>
                <input type="text" id="rating" name="rating" class="form-control form-control-user"
                       value="{{ $rating->rating }}" placeholder="Masukan Rating Tempat" required>
                @if($errors->has('rating'))
                    <span class="help-block">{{ $errors->first('rating') }}</span>
                @endif
            </div>
            <div class="modal-footer">
                <a href="/admin/rating" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
