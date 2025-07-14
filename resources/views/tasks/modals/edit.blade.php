<div class="modal fade" id="editTaskModal-{{ $task->id }}" tabindex="-1" aria-labelledby="editTaskModalLabel-{{ $task->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTaskModalLabel-{{ $task->id }}">Edit Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="taskName-{{ $task->id }}" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="taskName-{{ $task->id }}" name="name" value="{{ $task->name }}" required>
          </div>
          <div class="mb-3">
            <label for="taskProject-{{ $task->id }}" class="form-label">Project</label>
            <select id="taskProject-{{ $task->id }}" name="project_id" class="form-select" required>
              @foreach($projects as $project)
                <option value="{{ $project->id }}" @if($task->project_id == $project->id) selected @endif>{{ $project->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="taskPriority-{{ $task->id }}" class="form-label">Priority</label>
            <input type="number" class="form-control" id="taskPriority-{{ $task->id }}" name="priority" min="1" value="{{ $task->priority }}" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div> 