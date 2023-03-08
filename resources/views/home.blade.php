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
                    <div> Total In-Progress Tasks: {{ $inProgressTasks }} </div>
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
                                @include('task.modal.done')
                                @include('task.modal.delete')
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center">
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                            </a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                            </a>
                          </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
