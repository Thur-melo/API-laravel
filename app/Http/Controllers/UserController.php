<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario = Usuarios::all();
        return $usuario;
    }

    
 public function register(Request $request)
 {
    //  $usuario = new Usuarios();

    //  $usuario->nomeUser = $request->nomeUser;
     
    //  $usuario->save();
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
        $usuario = new Usuarios();

        $usuario->nomeUser = $request->nomeUser;
        // $usuario->cursoUser = $request->cursoUser;
        // $usuario->moduloUser = $request->moduloUser;
        
        $usuario->save();

        return response()->json($usuario);
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
