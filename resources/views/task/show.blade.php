@extends('layouts.template')

@section('content')
<div class="col-xl-8 col-lg-8">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Task Details</h4>
        </div>
        <div class="card-body">

            <div class="basic-form">
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input id="name" type="text" class="form-control-plaintext" name="name" value="{{ $task->name }}" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="description" class="form-control-plaintext" id="description" readonly>{{ $task->description }}</textarea>
                    </div>
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
                        <a href="{{ route('task.edit', $task) }}" type="button" class="btn btn-outline-warning btn-xs">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection