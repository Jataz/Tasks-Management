<div class="modal fade" id="editProjectModal-{{ $project->id }}" tabindex="-1" aria-labelledby="editProjectModalLabel-{{ $project->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProjectModalLabel-{{ $project->id }}">Edit Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('projects.update', $project->id) }}">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="projectName-{{ $project->id }}" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="projectName-{{ $project->id }}" name="name" value="{{ $project->name }}" required>
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