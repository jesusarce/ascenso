<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RequisitoAscenso extends Model {

    protected $table = 'requisito_ascensos';

    protected $fillable = [
        'req_titulo',
        'rec_capitulo',
        'req_gestion',
        'rasc_grado',
        'rasc_tiempo',
        'rasc_grado_grupo',
        'rasc_unidad_tiempo',
        'rasc_gestion',
        'rasc_abreviatura',
        'rasc_orden',
    ];

    public function requisitoDocumentos(): HasMany {
        return $this->hasMany(RequisitoDocumento::class, 'requisito_ascenso_id');
    }    
}
