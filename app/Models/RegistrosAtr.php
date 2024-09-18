<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;

class RegistrosAtr extends Model
{
    use HasFactory;

    protected $table = 'registro_atraso';

    
    protected $fillable = ['usuario_id', 'data_hora_chegada'];

    
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'usuario_id');
    }
}
