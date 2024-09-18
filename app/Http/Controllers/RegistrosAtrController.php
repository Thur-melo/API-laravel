<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\RegistrosAtr;
use Carbon\Carbon;


class RegistrosAtrController extends Controller
{
    public function registrarChegada(Request $request, $usuarioId)
{
    $registros = RegistrosAtr::with('usuario:id,nome,modulo,curso') // Carrega os dados do usuário
            ->get(['id', 'data_hora_chegada', 'usuario_id']); // Seleciona apenas os campos necessários

        $resultados = $registros->map(function ($registro) {
            return [
                'nome' => $registro->usuario->nome,
                'modulo' => $registro->usuario->modulo,
                'curso' => $registro->usuario->curso,
                'data_hora_chegada' => $registro->data_hora_chegada,
            ];
        });

        return response()->json($resultados);
    }
}
