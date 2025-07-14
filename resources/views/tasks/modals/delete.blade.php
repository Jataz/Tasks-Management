<div class="modal fade" id="deleteTaskModal-{{ $task->id }}" tabindex="-1" aria-labelledby="deleteTaskModalLabel-{{ $task->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTaskModalLabel-{{ $task->id }}">Delete Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Are you sure you want to delete the task <strong>{{ $task->name }}</strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div> 