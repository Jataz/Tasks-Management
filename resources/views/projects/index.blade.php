@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Projects</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProjectModal">Add Project</button>
</div>
<table class="table table-hover shadow-sm bg-white" id="projectsTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects as $project)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->created_at->diffForHumans() }}</td>
            <td>
                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editProjectModal-{{ $project->id }}">Edit</button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteProjectModal-{{ $project->id }}">Delete</button>
                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showProjectModal-{{ $project->id }}">View Tasks</button>
            </td>
        </tr>
        @include('projects.modals.edit', ['project' => $project])
        @include('projects.modals.delete', ['project' => $project])
        
        @endforeach
    </tbody>
</table>
@foreach($projects as $project)
  @include('projects.modals.show', ['project' => $project])
@endforeach
@include('projects.modals.create')
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#projectsTable').DataTable({
        paging: true,
        searching: true,
        info: true,
        ordering: true,
        responsive: true,
        columnDefs: [ { orderable: false, targets: 3 } ]
    });
});
</script>
@endpush 