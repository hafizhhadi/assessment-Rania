@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
            @if (session()->has('message'))
                <div class="alert {{ session()->get('alert') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
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
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tasks as $keys => $task)
                                <tr>
                                    <td>{{ $keys + 1 }}</td>
                                    <td>{{ ucfirst($task->name) }}</td>
                                    <td>{{ ucfirst($task->description) }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->getTaskCreatedAtDiffForHuman() }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#doneModal">Done</button>
                                        <a href="{{ route('task.show', $task) }}" type="button" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}">Delete</button>
                                    </td>
                                </tr>
                                @include('task.modal.done')
                                @include('task.modal.delete')
                            @empty
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>No data, Please add new data</td>
                            <td></td>
                            <td></td>
                            @endforelse
                        </tbody>
                    </table>
                    <br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-center">
                            {{ $tasks->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#finishTask" aria-expanded="true" aria-controls="finishTask">
                        Finish Tasks - {{ $completedTasks->count() }} Tasks
                    </button>
                  </h2>
                  <div id="finishTask" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @forelse ($completedTasks as $completedTask)
                            <ul> <li>{{ ucfirst($completedTask->name) }}</li> </ul>
                        @empty
                            No Finish tasks
                        @endforelse
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#inProgressTask" aria-expanded="false" aria-controls="inProgressTask">
                        In-progress Tasks - {{ $inProgressTasks->count() }} Tasks
                    </button>
                  </h2>
                  <div id="inProgressTask" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        @forelse ($inProgressTasks as $inProgressTask)
                            <ul> <li>{{ ucfirst($inProgressTask->name) }}</li> </ul>
                        @empty
                            No In-progress tasks
                        @endforelse
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
