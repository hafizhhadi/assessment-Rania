@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        @if (session()->has('message'))
            <div class="alert {{ session()->get('alert') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">To-Do-List</h4>
            </div>
            <div class="card-body">
                <div style="text-align: right">
                    <a href="{{ route('task.create') }}" type="button" class="btn btn-outline-primary btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
                                <td><a href="{{ route('task.show', $task) }}" class="link-primary">{{ ucfirst($task->name) }} </a></td>
                                <td>{{ ucfirst($task->description) }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="badge badge-rounded badge-{{ trans('badges.' . $task->status->value) }}">
                                        {{ $task->status }}
                                    </a>
                                </td>
                                <td>{{ $task->getTaskCreatedAtDiffForHuman() }}</td>
                                <td>
                                    @if ($task->status == App\Enums\TaskStatusEnum::InProgress)
                                        <button type="button" class="btn btn-outline-success btn-xxs" data-bs-toggle="modal" data-bs-target="#doneModal{{ $task->id }}"><i class="fa fa-check" aria-hidden="true"></i></button>
                                        <a href="{{ route('task.edit', $task) }}" type="button" class="btn btn-outline-warning btn-xxs"><i class="fas fa-edit"></i></a>
                                    @endif
                                    <button type="button" class="btn btn-outline-danger btn-xxs" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $task->id }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
    
    <div class="col-md-3">
        <div class="accordion accordion-danger-solid" id="accordion-two">
            <div class="accordion-item">
              <div class="accordion-header rounded-lg" id="accord-2One" data-bs-toggle="collapse" data-bs-target="#finishTask" aria-controls="finishTask" aria-expanded="true" role="button">
                <span class="accordion-header-text"> Finish Tasks - {{ $completedTasks->count() }} Tasks</span>
              </div>
              <div id="finishTask" class="collapse accordion__body show" aria-labelledby="accord-2One" data-bs-parent="#accordion-two">
                <div class="accordion-body-text">
                    @forelse ($completedTasks as $completedTask)
                        <ul class="list-group">
                            <li class="list-group-item">{{ ucfirst($completedTask->name) }}</li>
                        </ul>
                    @empty
                        No Finished tasks
                    @endforelse
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <div class="accordion-header collapsed rounded-lg" id="accord-2Two" data-bs-toggle="collapse" data-bs-target="#inProgressTask" aria-controls="inProgressTask"   aria-expanded="true"  role="button">
                <span class="accordion-header-text">In-progress Tasks - {{ $inProgressTasks->count() }} Tasks</span>
              </div>
              <div id="inProgressTask" class="collapse accordion__body" aria-labelledby="accord-2Two" data-bs-parent="#accordion-two">
                <div class="accordion-body-text">
                    @forelse ($inProgressTasks as $inProgressTask)
                        <ul class="list-group">
                            <li class="list-group-item">{{ ucfirst($inProgressTask->name) }}</li>
                        </ul>
                    @empty
                        No In-progress tasks
                    @endforelse
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
