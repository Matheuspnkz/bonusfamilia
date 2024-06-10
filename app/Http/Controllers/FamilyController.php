<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $families = Family::all();
        return response()->json($families);
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
        $families = new Family($request->all());
        $families->save();
        return response()->json([
            "message" => "Family added successfully!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $families = Family::find($id);
        if (!empty($families)) {
            return response()->json($families);
        } else {
            return response()->json([
                "message" => "Family not found!"
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $families = Family::find($id);
        if (!empty($families)) {
            return response()->json($families);
        } else {
            return response()->json([
                "message" => "Family not found!"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $families = Family::find($id);
        if (!empty($families)) {
            $families->update($request->all());
            $families->save();
            return response()->json([
                "message" => "Family updated successfully!"
            ], 200);
        } else {
            return response()->json([
                "message" => "Family not found!"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        if (Family::where('id', $id)->exists()) {
            $families = Family::find($id);
            if (!empty($families)) {
                $families->delete();
            }

            return response()->json([
                "message" => "Family deleted successfully!"
            ], 202);
        } else {
            return response()->json([
                "message" => "Family not found!"
            ], 404);
        }
    }
}

