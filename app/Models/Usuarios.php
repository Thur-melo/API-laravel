<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

     protected $table = 'tbuser';

     protected $primaryKey = 'idUser';

     public $timestamps = false;

     protected $fillable =[
        'nomeUser', 'emailUser', 'senhaUser'

     ];


}
