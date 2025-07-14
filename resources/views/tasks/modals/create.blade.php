<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="createTaskModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createTaskModalLabel">Add Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="taskName" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="taskName" name="name" required>
          </div>
          <div class="mb-3">
            <label for="taskProject" class="form-label">Project</label>
            <select id="taskProject" name="project_id" class="form-select" required>
              <option value="">Select Project</option>
              @foreach($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="taskPriority" class="form-label">Priority</label>
            <input type="number" class="form-control" id="taskPriority" name="priority" min="1" value="1" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
      </form>
    </div>
  </div>
</div> 