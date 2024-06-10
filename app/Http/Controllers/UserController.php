<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create()
    {
        //
    }

    public function store(Request $request): JsonResponse
    {
        $user = new User($request->all());
        $user->save();
        return response()->json([
        "message" => "User added successfully!"
      ], 201);

    }

    public function show($id): JsonResponse
    {
        $user = User::find($id);
        if (!empty($user))
        {
            return response()->json($user);
        }
        else
        {
            return response()->json([
                "message" => "User not found!"
            ], 404);
        }
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        if (!empty($user))
        {
            return response()->json($user);
        }
        else
        {
            return response()->json([
                "message" => "User not found!"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!empty($user)) {
            $user->update($request->all());
            $user->save();
            return response()->json([
                "message" => "User updated successfully!"
            ], 200);
        }else{
            return response()->json([
                "message" => "User not found!"
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "User deleted successfully!"
            ], 202);
        } else {
            return response()->json([
                "message" => "User not found!"
            ], 404);
        }
    }
}
