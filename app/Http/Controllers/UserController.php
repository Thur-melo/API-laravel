<?php

namespace App\Http\Controllers;

use App\Models\RegistrosAtr;
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

    
 

   
public function login(Request $request)
{
  
    $user = Usuarios::where('nome', $request->nome)
                ->where('modulo', $request->modulo)
                ->where('curso', $request->curso)
                ->first();

    if ($user) {
        return response()->json([
            'userId' => $user->id, 
            'nome' => $user->nome,
            
        ], 200);
    } else {
        return response()->json([
            'message' => 'Usuário não encontrado',
        ], 404);
    }
}




    /**
     * Store a newly created resource in storage  */
    public function store(Request $request)
    {
        $usuario = new Usuarios();

        $usuario->nome = $request->nome;
         $usuario->curso = $request->curso;
         $usuario->modulo = $request->modulo;
        
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
