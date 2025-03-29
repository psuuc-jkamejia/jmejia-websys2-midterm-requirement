<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'details' => 'nullable|string',
            'deadline' => 'required|date',
            'status' => 'required|string|in:To-Do,In Progress,Completed',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
        ]);
    
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
        }
    
        Task::create([
            'title' => $request->title,
            'category' => $request->category,
            'details' => $request->details,
            'deadline' => $request->deadline,
            'status' => $request->status,
            'attachment' => $attachmentPath,
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task added successfully!');
    }
    

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'details' => 'nullable|string',
            'deadline' => 'required|date',
            'status' => 'required|string|in:To-Do,In Progress,Completed',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,docx|max:2048',
        ]);
    
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attachments', 'public');
            $task->attachment = $attachmentPath;
        }
    
        $task->update([
            'title' => $request->title,
            'category' => $request->category,
            'details' => $request->details,
            'deadline' => $request->deadline,
            'status' => $request->status,
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}
