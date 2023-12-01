<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    
    public function get() {
        try {
            $data = User::all();

            return Inertia::render('Dashboard', ['users'=> $data]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
        }
    }

    public function create(Request $request) {
        try { 
            $data = User::create([
                'name' => $request -> name,
                'lastname' => $request -> lastname,
                'email' => $request -> email,
                'password' => bcrypt($request->password)
            ]);
            return response() -> json($data, 200);
         } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
         }
    }

    public function getById($id) {
        try {
            $data = User::where('id', $id) -> first();
            return response() -> json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
        }
    }

    public function getByEmail($email) {
        try {
            $data = User::where('email', $email) -> first();
            return response() -> json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $email) {
        try {
            $data = User::where('email', $email) -> update([
                'name' => $request -> name,
                'lastname' => $request -> lastname,
                'email' => $request -> email,
                'password' => bcrypt($request->password)
            ]);
            return response() -> json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
        }
    }

    public function delete($id) {
        try {
            $data = User::where('id', $id) -> delete();
            return response() -> json($data, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th -> getMessage()
            ], 500);
        }
    }

    public function updateStatus(User $user)
    {
        $user->update([
            'active' => !$user->active, // Alternar el estado activo/inactivo
        ]);

        return response()->json(['message' => 'Estado actualizado correctamente']);
    }
}
