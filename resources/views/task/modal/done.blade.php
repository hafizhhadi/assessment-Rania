<div class="modal fade" id="doneModal{{ $task->id }}" tabindex="-1" aria-labelledby="doneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="doneModalLabel">Finish</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Confirm Finish Task?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary btn-xs" data-bs-dismiss="modal"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
          <a href="{{ route('task.complete', $task) }}" type="button" class="btn btn-outline-success btn-xs">Complete</a>
        </div>
      </div>
    </div>
</div>