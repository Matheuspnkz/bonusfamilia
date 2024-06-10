<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RelativeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $relatives = Relative::all();
        return response()->json($relatives);
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
        $relatives = new Relative($request->all());
        $relatives->save();
        return response()->json([
            "message" => "Relative added successfully!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $relatives = Relative::find($id);
        if (!empty($relatives))
        {
            return response()->json($relatives);
        }
        else
        {
            return response()->json([
                "message" => "Relative not found!"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $relatives = Relative::find($id);
        if (!empty($relatives))
        {
            return response()->json($relatives);
        }
        else
        {
            return response()->json([
                "message" => "Relative not found!"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $relatives = Relative::find($id);
        if (!empty($relatives)) {
            $relatives->update($request->all());
            $relatives->save();
            return response()->json([
                "message" => "Relative updated successfully!"
            ], 200);
        }else{
            return response()->json([
                "message" => "Relative not found!"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        if(Relative::where('id', $id)->exists()) {
            $relatives = Relative::find($id);
            $relatives->delete();

            return response()->json([
                "message" => "Relative deleted successfully!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Relative not found!"
            ], 404);
        }
    }

}
