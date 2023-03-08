@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="col-md-10 mt-2" style="text-align: right">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control" id="description" rows="2">{{ old('description') }}</textarea>
                            </div>
                            @if ($errors->has('description'))
                                <div class="col-md-10 mt-2" style="text-align: right">
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="row mb-0" style="text-align: right">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#storeModal">Save</button>
                            </div>
                        </div>

                        @include('task.modal.store')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection