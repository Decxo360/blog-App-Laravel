<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $primaryKey = 'idusuario';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $table = 'usuarios';

    protected $fillable = [
        'correo',
        'contrasena',
        'nombre',
        'apellidos',
        'nickname'
    ];
}
