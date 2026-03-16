<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return TaskResource::collection($request->user()->tasks);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task = $request->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return new TaskResource($task);
    }

    public function update(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'in:pending,completed',
        ]);

        $task->update($request->only(['title', 'description', 'status']));

        return new TaskResource($task);
    }

    public function destroy(Request $request, Task $task)
    {
        if ($task->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}