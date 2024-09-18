<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\RegistrosAtr;


class RegistrosAtrController extends Controller
{
    public function registrarChegada(Request $request, $usuarioId)
{
    $usuario = Usuarios::findOrFail($usuarioId); 

    $registro = new RegistrosAtr();
    $registro->usuario_id = $usuario->id; 
    $registro->data_hora_chegada = now(); 
    $registro->save();

    return response()->json(['message' => 'Chegada registrada com sucesso!'], 201);
}
}
