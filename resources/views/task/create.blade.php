@extends('layouts.template')

@section('content')
<div class="col-xl-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create New Task</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('task.store') }}">
                @csrf
                <div class="basic-form">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                        </div>
                        @if ($errors->has('name'))
                            <div class="col" style="text-align: right">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
                        </div>
                        @if ($errors->has('description'))
                            <div class="col" style="text-align: right">
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="row" style="text-align: right">
                        <div>
                            <a href="{{ route('home') }}" type="button" class="btn btn-outline-dark btn-xs"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-outline-success btn-xs" data-bs-toggle="modal" data-bs-target="#storeModal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                @include('task.modal.store')
            </form>
        </div>
    </div>
</div>
@endsection