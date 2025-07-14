<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
let currentProject = null;

function fetchProjects() {
    fetch('/projects')
        .then(res => res.json())
        .then(projects => {
            const select = document.getElementById('projectSelect');
            const taskProject = document.getElementById('taskProject');
            select.innerHTML = '';
            taskProject.innerHTML = '';
            projects.forEach(p => {
                const opt = document.createElement('option');
                opt.value = p.id;
                opt.textContent = p.name;
                select.appendChild(opt.cloneNode(true));
                taskProject.appendChild(opt);
            });
            if (projects.length) {
                select.value = projects[0].id;
                currentProject = projects[0].id;
                fetchTasks();
            }
        });
}

function fetchTasks() {
    fetch(`/tasks?project_id=${currentProject}`)
        .then(res => res.json())
        .then(tasks => {
            const list = document.getElementById('taskList');
            list.innerHTML = '';
            tasks.forEach(task => {
                const li = document.createElement('li');
                li.className = 'list-group-item d-flex justify-content-between align-items-center';
                li.dataset.id = task.id;
                li.innerHTML = `
                    <span>${task.name}</span>
                    <div>
                        <button class="btn btn-sm btn-secondary me-1" onclick="editTask(${task.id}, '${task.name}', ${task.project_id})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteTask(${task.id})">Delete</button>
                    </div>
                `;
                list.appendChild(li);
            });
            makeSortable();
        });
}

function makeSortable() {
    new Sortable(taskList, {
        animation: 150,
        onEnd: function () {
            const items = Array.from(document.querySelectorAll('#taskList li'));
            const tasks = {};
            items.forEach((li, idx) => {
                tasks[li.dataset.id] = idx + 1;
            });
            fetch('/tasks/reorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ tasks })
            });
        }
    });
}

document.getElementById('projectSelect').addEventListener('change', function() {
    currentProject = this.value;
    fetchTasks();
});

document.getElementById('taskForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('taskId').value;
    const name = document.getElementById('taskName').value;
    const project_id = document.getElementById('taskProject').value;
    const method = id ? 'PUT' : 'POST';
    const url = id ? `/tasks/${id}` : '/tasks';
    fetch(url, {
        method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            name,
            project_id,
            priority: 1 // will be updated on reorder
        })
    }).then(() => {
        fetchTasks();
        bootstrap.Modal.getInstance(document.getElementById('taskModal')).hide();
        this.reset();
    });
});

function openTaskModal() {
    document.getElementById('taskId').value = '';
    document.getElementById('taskName').value = '';
    document.getElementById('taskProject').value = currentProject;
}

function editTask(id, name, project_id) {
    document.getElementById('taskId').value = id;
    document.getElementById('taskName').value = name;
    document.getElementById('taskProject').value = project_id;
    new bootstrap.Modal(document.getElementById('taskModal')).show();
}

function deleteTask(id) {
    if (confirm('Delete this task?')) {
        fetch(`/tasks/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => fetchTasks());
    }
}

document.addEventListener('DOMContentLoaded', function() {
    fetchProjects();
});
</script> 