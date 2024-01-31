@extends('dashboard.layout.master')

@section('title_content')
<h6 class="m-0 font-weight-bold text-primary">Data Log Activity</h6>
@endsection

@section('content')
@if(session('status'))
<div class="alert alert-info" role="alert">
    {{ session('status') }}
</div>
@endif
<!-- <button type="button" class="btn btn-sm btn-success shadow-sm mb-3" data-toggle="modal" data-target="#addModal"><i
        class="fas fa-plus fa-sm text-white-50"></i>
    Tambah
    Jasa</button> -->
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Aktivitas</th>
                <th>Waktu Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activity_logs as $index =>$logactivity)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $logactivity->activity }}</td>
                <td>{{ $logactivity->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Add Modal --}}
<!-- <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
</div> -->
@endsection