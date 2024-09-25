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
        // Cria um novo registro de atraso para o usuário
        $registro = new RegistrosAtr();
        $registro->usuario_id = $usuarioId;
        $registro->data_hora_chegada = now(); // Registra a data e hora atual
        $registro->save(); // Salva o registro no banco de dados
    
        // Busca todos os registros de atraso para o usuár
        return response()->json($registro); // Retorna a lista de atrasos do usuário
    }


    public function getChegadas($usuarioId)
{
    // Busca os registros de atraso com as informações do usuário
    $registros = RegistrosAtr::where('usuario_id', $usuarioId)
        ->with('usuario:id,nome,modulo,curso') // Relaciona os dados do usuário
        ->get(['id', 'data_hora_chegada', 'usuario_id']); // Seleciona os campos necessários

    // Mapeia os registros para incluir as informações do usuário no retorno
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