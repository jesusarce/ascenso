<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AscensoParametro extends Model {
    
    use SoftDeletes;
    
    protected $table = 'ascenso_parametros';
    
    protected $fillable = [
	    'ascp_nombre',
	    'ascp_grupo',
	    'ascp_grado',
	    'ascp_abreviatura',
	    'ascp_nota_detalle',
    ];
}
