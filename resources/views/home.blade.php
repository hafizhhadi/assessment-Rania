@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div> Total Finish Tasks: {{ $completedTasks }} </div>
                    <div> Total In-Progress Tasks: </div>
                    <div style="text-align: right">
                        <a href="{{ route('task.create') }}" type="button" class="btn btn-outline-primary">Add Task</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>To do</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $keys => $task)
                                <tr>
                                    <td>{{ $keys + 1 }}</td>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#doneModal">Done</button>
                                        <a href="{{ route('task.show', $task) }}" type="button" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @include('task.modal.done')
            @include('task.modal.delete')
        </div>
    </div>
</div>
@endsection
