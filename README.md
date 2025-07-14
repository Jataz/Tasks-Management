# Laravel Task Management Application

A simple, modern Laravel web application for managing tasks and projects. Features include:

- Create, edit, delete tasks
- Reorder tasks with drag-and-drop (priority auto-updates)
- Associate tasks with projects
- Filter tasks by project
- Manage projects (add, edit, delete)
- All forms use Bootstrap modals
- Modern UI with DataTables for search, pagination, and sorting

## Features

- **Task Management:** Add, edit, delete, and reorder tasks. Each task has a name, priority, and is associated with a project.
- **Project Management:** Add, edit, and delete projects. Tasks are grouped by project.
- **Drag-and-Drop:** Reorder tasks in the browser; priorities update automatically.
- **AJAX & Modals:** All operations are performed via AJAX and Bootstrap modals for a smooth user experience.
- **DataTables:** Instant search, pagination, and sorting for both tasks and projects.

## Setup Instructions

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm (for asset compilation, optional)

### Installation
1. **Clone the repository:**
   ```sh
   git clone https://github.com/Jataz/Tasks-Management.git
   cd task
   ```
2. **Install dependencies:**
   ```sh
   composer install
   ```
3. **Copy the example environment file and set your environment variables:**
   ```sh
   cp .env.example .env
   # Edit .env to set your database credentials
   ```
4. **Generate application key:**
   ```sh
   php artisan key:generate
   ```
5. **Run migrations:**
   ```sh
   php artisan migrate
   ```

6. **Start the development server:**
   ```sh
   php artisan serve
   ```
7. **Visit the app:**
   Open [http://localhost:8000/tasks](http://localhost:8000/tasks) in your browser.

## File Structure

```
resources/views/
  layouts/
    app.blade.php                # Main layout with navbar
  tasks/
    index.blade.php              # Task list/table with DataTables and drag-and-drop
    modals/
      create.blade.php           # Modal for creating a task
      edit.blade.php             # Modal for editing a task
      delete.blade.php           # Modal for deleting a task
  projects/
    index.blade.php              # Project list/table with DataTables
    modals/
      create.blade.php           # Modal for creating a project
      edit.blade.php             # Modal for editing a project
      delete.blade.php           # Modal for deleting a project
      show.blade.php             # Modal for showing tasks for a project

app/Http/Controllers/
  TaskController.php             # Task CRUD, drag-and-drop reorder
  ProjectController.php          # Project CRUD

routes/
  web.php                        # Web routes (resourceful, drag-and-drop)

public/
  (No custom assets needed; uses CDN for Bootstrap, DataTables, jQuery, SortableJS)
```

