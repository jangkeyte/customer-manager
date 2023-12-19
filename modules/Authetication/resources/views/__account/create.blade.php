@extends('JangKeyte::layouts.master')

@section('title', 'Trang tạo mới cây xanh')

@section('content')

@isset($target)
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::open(array('url' => route($target . '.create'), 'method' => 'post')) !!}      
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Thêm mới</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="test" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endisset

@stop
