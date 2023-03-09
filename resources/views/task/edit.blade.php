@extends('layouts.template')

@section('content')
<div class="col-xl-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Task Details</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('task.update', $task) }}">
                @csrf

                <div class="basic-form">
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $task->name) }}">
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
                            <textarea name="description" class="form-control" id="description">{{ old('description', $task->description) }}</textarea>
                        </div>
                        @if ($errors->has('description'))
                            <div class="col" style="text-align: right">
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                        @endif
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input id="status" type="text" class="form-control-plaintext" name="status" value="{{ $task->status }}" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Created At</label>
                        <div class="col-sm-9">
                            <input id="created_at" type="text" class="form-control-plaintext" name="created_at" value="{{ $task->getTaskCreatedAtDiffForHuman() }}" readonly>
                        </div>
                    </div>
                    
                    <div class="row" style="text-align: right">
                        <div>
                            <a href="{{ route('home') }}" type="button" class="btn btn-outline-dark btn-xs"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                            <button type="button" class="btn btn-outline-warning btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal"><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
                </div>
                @include('task.modal.update')
            </form>
        </div>
    </div>
</div>
@endsection