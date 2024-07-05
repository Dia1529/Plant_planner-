<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        //$tasks = Task::where('user_id', Auth::id())->get();
        //return view('tasks.index', compact('tasks'));
        $tasks = Task::where('user_id', Auth::id())->latest()->paginate(4);
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::id(),
            'completed' => false,
        ]);

        return redirect()->route('tasks.index');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index');
    }

    public function updateCompletion(Request $request, Task $task)
    {
        $request->validate([
            'completed' => 'required|boolean',
        ]);

        $task->update([
            'completed' => (bool) $request->input('completed'),
        ]);

        if ($task->completed) {
            $this->incrementDropletCount(Auth::user());
            $task->delete();
        }

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    private function incrementDropletCount(User $user): void
    {
        $user->increment('droplet_count');
    }
}
