@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Tasks</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">Add Task</button>
</div>
<table class="table table-hover shadow-sm bg-white" id="tasksTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Project</th>
            <th>Priority</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="sortableTasks">
        @foreach($tasks as $task)
        <tr data-id="{{ $task->id }}">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $task->name }}</td>
            <td>{{ $task->project->name ?? '-' }}</td>
            <td>{{ $task->priority }}</td>
            <td>{{ $task->created_at->diffForHumans() }}</td>
            <td>
                <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editTaskModal-{{ $task->id }}">Edit</button>
                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTaskModal-{{ $task->id }}">Delete</button>
            </td>
        </tr>
        @include('tasks.modals.edit', ['task' => $task])
        @include('tasks.modals.delete', ['task' => $task])
        @endforeach
    </tbody>
</table>
@include('tasks.modals.create')
@endsection
@push('scripts')

<script>
$(document).ready(function() {
    var table = $('#tasksTable').DataTable({
        paging: true,
        searching: true,
        info: true,
        ordering: true,
        responsive: true,
        columnDefs: [ { orderable: false, targets: 5 } ]
    });

    // Drag-and-drop reordering
    new Sortable(document.getElementById('sortableTasks'), {
        animation: 150,
        handle: 'td',
        onEnd: function () {
            let order = [];
            $('#sortableTasks tr').each(function(index) {
                order.push({ id: $(this).data('id'), priority: index + 1 });
            });
            $.ajax({
                url: '{{ route('tasks.reorder') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    tasks: order.reduce((acc, cur) => { acc[cur.id] = cur.priority; return acc; }, {})
                },
                success: function() {
                    location.reload();
                }
            });
        }
    });
});
</script>
@endpush 