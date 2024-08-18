<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuarios::all();
        return response ()->json($usuarios);
    }


    public function register(Request $request)
    {
        $usuario = Usuarios::create([
            'nomeUser' => $request->nomeUser,
            'emailUser' => $request->emailUser,
            'senhaUser' => $request->senhaUser,
        ]);

        return response()->json($usuario);


    }

    public function login(Request $request){
        $usuario = Usuarios::where('emailUser',$request->emailUser)->first();

        if ($usuario && $usuario->senhaUser === $request ->senhaUser){
            return response()->json($usuario);


        }

        return response()->json(['message' => 'Seha errada ae pae, ou email errado'], 401);

    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
