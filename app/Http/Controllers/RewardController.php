<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $rewards = Reward::all();
        return response()->json($rewards);
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
        $rewards = new Reward($request->all());
        $rewards->save();
        return response()->json([
            "message" => "Reward added successfully!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $rewards = Reward::find($id);
        if (!empty($rewards))
        {
            return response()->json($rewards);
        }
        else
        {
            return response()->json([
                "message" => "Reward not found!"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rewards = Reward::find($id);
        if (!empty($rewards))
        {
            return response()->json($rewards);
        }
        else
        {
            return response()->json([
                "message" => "Reward not found!"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $rewards = Reward::find($id);
        if (!empty($rewards)) {
            $rewards->update($request->all());
            $rewards->save();
            return response()->json([
                "message" => "Reward updated successfully!"
            ], 200);
        }else{
            return response()->json([
                "message" => "Reward not found!"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        if(Reward::where('id', $id)->exists()) {
            $rewards = Reward::find($id);
            $rewards->delete();

            return response()->json([
                "message" => "Reward deleted successfully!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Reward not found!"
            ], 404);
        }
    }
}
