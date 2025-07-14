<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('project')->orderBy('priority')->get();
        $projects = Project::all();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = Task::create($request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id',
        ]));
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|integer',
            'project_id' => 'required|exists:projects,id',
        ]));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function reorder(Request $request)
    {
        $tasks = $request->input('tasks'); // array of [id => priority]
        foreach ($tasks as $id => $priority) {
            Task::where('id', $id)->update(['priority' => $priority]);
        }
        return response()->json(['status' => 'ok']);
    }
}
