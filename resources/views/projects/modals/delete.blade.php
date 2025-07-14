<div class="modal fade" id="deleteProjectModal-{{ $project->id }}" tabindex="-1" aria-labelledby="deleteProjectModalLabel-{{ $project->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProjectModalLabel-{{ $project->id }}">Delete Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" action="{{ route('projects.destroy', $project->id) }}">
        @csrf
        @method('DELETE')
        <div class="modal-body">
          <p>Are you sure you want to delete the project <strong>{{ $project->name }}</strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div> 