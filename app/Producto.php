<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'sku', 'nombre', 'descripcion', 'id_categoria','stock','precio','imagen',

    ];
}
