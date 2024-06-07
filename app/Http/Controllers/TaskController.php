<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks);
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
    public function store(Request $request): JsonResponse
    {
        $tasks = new Task($request->all());
        $tasks->save();
        return response()->json([
            "message" => "Task added successfully!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $tasks = Task::find($id);
        if (!empty($tasks))
        {
            return response()->json($tasks);
        }
        else
        {
            return response()->json([
                "message" => "Task not found!"
            ], 404);
        }
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
    public function update(Request $request, string $id): JsonResponse
    {
        $tasks = Task::find($id);
        if (!empty($tasks)) {
            $tasks->update($request->all());
            $tasks->save();
            return response()->json([
                "message" => "Task updated successfully!"
            ], 404);
        }else{
            return response()->json([
                "message" => "Task not found!"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        if(Task::where('id', $id)->exists()) {
            $tasks = Task::find($id);
            $tasks->delete();

            return response()->json([
                "message" => "Task deleted successfully!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Task not found!"
            ], 404);
        }
    }

}
