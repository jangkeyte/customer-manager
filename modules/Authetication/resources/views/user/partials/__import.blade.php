@extends('JangKeyte::container')

@section('header-title', 'Nhập dữ liệu người dùng vào hệ thống')

@section('main-content')
<div>
    @if(session()->has('message'))
        @if(is_int(session()->get('message')))
        <div class="alert alert-success">
            Nhập [<strong>{{ session()->get('message') }}</strong>] dòng dữ liệu thành công.
        </div>
        @else
        <div class="alert alert-danger">
            Dòng thứ [<strong>{!! session()->get('message')->row() !!}</strong>] bị lỗi [<strong>{!! session()->get('message')->attribute() !!}</strong>] lý do [<strong>{!! session()->get('message')->errors()[0] !!}</strong>] với dữ liệu là [<strong>{!! session()->get('message')->values()[session()->get('message')->attribute()] !!}</strong>]
        </div>
        @endif
    @endif
    @if($errors->has('area'))
        <div class="error">{{ $errors->first('area') }}</div>
    @endif
</div>
<div class="row">
    <div class="col-md-12">
    {!! Form::open(array('url' => route('user.import'), 'method' => 'post', 'files' => true)) !!}
        @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Chọn file đính kèm (<span class="red">*</span>)</label>
                    <input type="file" name="files" id="files" value="" class="">
                </div>
            </div>
            <a href="{!! asset('storage/uploads/user_templates.xlsx') !!}" class="mt-3"><i class="fa fa-download"></i> <span class="d-none d-md-inline">Tải về file mẫu</span></a>
        </div><hr>
        <div class="row">    
            <div class="col-md-6">
                <button class="btn btn-success btn-sm" type="submit"><i class="fa fa-save"></i>&nbsp;Nhập dữ liệu</button>
            </div>        
        </div>
    {!! Form::close() !!}
    </div>
</div>
@stop