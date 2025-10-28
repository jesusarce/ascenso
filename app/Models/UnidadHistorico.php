<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnidadHistorico extends Model {
    
    use SoftDeletes;

    protected $table = 'unidad_historicos';

    protected $fillable = [
        'unidad_id',
        'unih_coduni',
        'unih_descripcion',
        'unih_tipo',
        'unih_puntaje',
        'unih_puntajeadd',
        'unih_gestion',
        'uhis_estado',
    ];
}
