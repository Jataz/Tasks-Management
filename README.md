# Laravel Task Management Application

A simple, modern Laravel web application for managing tasks and projects. Features include:

- Create, edit, delete tasks
- Reorder tasks with drag-and-drop (priority auto-updates)
- Associate tasks with projects
- Filter tasks by project
- Manage projects (add, edit, delete)
- All forms use Bootstrap modals

## Features

- **Task Management:** Add, edit, delete, and reorder tasks. Each task has a name, priority, and is associated with a project.
- **Project Management:** Add, edit, and delete projects. Tasks are grouped by project.
- **Drag-and-Drop:** Reorder tasks in the browser; priorities update automatically.
- **AJAX & Modals:** All operations are performed via AJAX and Bootstrap modals for a smooth user experience.

## Setup Instructions

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm (for asset compilation, optional)

### Installation
1. **Clone the repository:**
   ```sh
   git clone <your-repo-url>
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
6. **(Optional) Compile assets:**
   ```sh
   npm install && npm run build
   ```
7. **Start the development server:**
   ```sh
   php artisan serve
   ```
8. **Visit the app:**
   Open [http://localhost:8000/tasks](http://localhost:8000/tasks) in your browser.

## Usage
- Use the "Add Task" button to create a new task (modal form).
- Drag and drop tasks to reorder them; priorities update automatically.
- Use the project dropdown to filter tasks by project.
- Manage projects using the project modal.

## File Structure
- `app/Models/Task.php` — Task model
- `app/Models/Project.php` — Project model
- `app/Http/Controllers/TaskController.php` — Task controller (CRUD, reorder)
- `app/Http/Controllers/ProjectController.php` — Project controller (CRUD)
- `resources/views/tasks.blade.php` — Main UI (modals, drag-and-drop)
- `resources/views/layouts/app.blade.php` — Layout
- `routes/web.php` — Web routes

## Customization
- You can further customize the UI or add authentication as needed.

## License
MIT
