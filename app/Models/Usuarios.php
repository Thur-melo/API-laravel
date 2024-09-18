<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegistrosAtr;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = ['nome', 'curso', 'modulo'];

   
    public function registros()
    {
        return $this->hasMany(RegistrosAtr::class, 'usuario_id');
    }


}
