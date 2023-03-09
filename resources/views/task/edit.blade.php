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
                            <input id="name" type="text" class="form-control" name="name" value="{{ $task->name }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-3 col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
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