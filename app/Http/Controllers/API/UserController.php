<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        $per_page =$request->get('per_page',25);
        $user=user::paginate($per_page);
        return response()->json($user);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $access_token =$user->createToken('authToken')->plainTextToken;
        if($user){
            return response()->json([
                'status'=>'201',
                'message'=>'User has been created successfully.',
                'token'=> $access_token
                ], 201);
        }else{
            return response()->json([
                'status'=>'404',
                'message'=>'somethings was worng'
                ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user=user::findOrFail($id);
        return response()->json( $user);
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
    public function update(Request $request, string $id)
    {
        $user=user::findOrFail($id);
        $user->update($request->all());
        return response()->json($user);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=user::findOrFail($id);
        $user->delete();
        return response()->json([
            'status'=>200,
            'message'=>'user deleted successfully',
        
        ],200);
    }
}
