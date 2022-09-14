<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $primaryKey = 'idpublicacion';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $table = 'publicaciones';

    protected $fillable = [ 
        'titulo',
        'subtiulo',
        'descripcion',
        'idusuario',
    ];
}
