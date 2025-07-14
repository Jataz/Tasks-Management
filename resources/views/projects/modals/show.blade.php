<div class="modal fade" id="showProjectModal-{{ $project->id }}" tabindex="-1" aria-labelledby="showProjectModalLabel-{{ $project->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="showProjectModalLabel-{{ $project->id }}">Tasks for Project: {{ $project->name }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @php $tasks = $project->tasks()->orderBy('priority')->get(); @endphp
        @if($tasks->count())
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Priority</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tasks as $task)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $task->name }}</td>
              <td>{{ $task->priority }}</td>
              <td>{{ $task->created_at->diffForHumans() }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else
        <div class="alert alert-info mb-0">No tasks found for this project.</div>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 