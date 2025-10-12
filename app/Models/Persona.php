<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Modelo Persona
 *
 * Representa una persona en el sistema.
 *
 * @property int $id ID de la persona
 * @property string $pers_codper Código personal
 * @property string $pers_folder Folder
 * @property string $pers_codigo_mininsterio Código ministerio
 * @property string $pers_cua CUA
 * @property string $pers_cta_banco Cuenta bancaria
 * @property string $grad_descripcion Descripción del grado
 * @property string $pers_apellido_paterno Apellido paterno
 * @property string $pers_apellido_materno Apellido materno
 * @property string $pers_nombres Nombres
 * @property string $pers_estado_civil Estado civil
 * @property string $pers_sexo Sexo
 * @property string $sangre Tipo de sangre
 * @property string $pers_fecha_nacimiento Fecha de nacimiento
 * @property string $espe_cod Código especialidad
 * @property string $espe_descripcion Descripción especialidad
 * @property string $espe_abreviacion Abreviación especialidad
 * @property string $unid_cod Código unidad
 * @property string $unid_descricion Descripción unidad
 * @property string $unid_abreviatura Abreviatura unidad
 * @property int $tipo_sangre_id ID tipo sangre
 * @property string $pers_ci CI
 * @property string $pers_ci_complemento Complemento CI
 * @property string $pers_expedido Expedido
 * @property string $pers_carnet_militar Carnet militar
 * @property string $pers_carnet_cosmil Carnet cosmil
 * @property int $unidad_id ID unidad
 * @property string $coduni Código unidad
 * @property int $cargo_id ID cargo
 * @property string $codcar Código cargo
 * @property string $pers_fecha_alta Fecha alta
 * @property int $escalafon_id ID escalafón
 * @property string $codescal Código escalafón
 * @property int $instituto_id ID instituto
 * @property string $codinst Código instituto
 * @property int $profesion_id ID profesión
 * @property string $codprof Código profesión
 * @property int $arma_id_origen ID arma origen
 * @property string $armaori Código arma origen
 * @property int $situacion_id ID situación
 * @property string $codsit Código situación
 * @property string $convo Convocatoria
 * @property string $pers_fecha_baja Fecha baja
 * @property string $pers_fecha_reincorporacion Fecha reincorporación
 * @property string $pers_numero_documento_baja Número documento baja
 * @property string $pers_fecha_ascenso Fecha ascenso
 * @property string $pers_puesto Puesto
 * @property string $pers_entre Entre
 * @property string $pers_codigo_anterior Código anterior
 * @property string $pers_estudiante_militar Estudiante militar
 * @property string $ref1 Referencia 1
 * @property string $ref2 Referencia 2
 * @property string $ref3 Referencia 3
 * @property string $ref4 Referencia 4
 * @property string $usralt Usuario alta
 * @property string $falta Fecha alta
 * @property string $usrupd Usuario actualización
 * @property string $fupd Fecha actualización
 * @property-read CargoDestino[] $cargoDestinos Relación con CargoDestino
 * @property-read DisciplinaDemerito[] $disciplinaDemerito Relación con DisciplinaDemerito
 * @property-read InstitutoMilitar $institutoMilitar Relación con InstitutoMilitar
 * @property-read ProfesionLibre $profesionLibre Relación con ProfesionLibre
 * @property-read TipoCargo $tipoCargo Relación con TipoCargo
 */
class Persona extends Model {

    use SoftDeletes;

    /**
     * Nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'personas';

    /**
     * Atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'pers_codper',
        'pers_folder',
        'pers_codigo_mininsterio',
        'pers_cua',
        'pers_cta_banco',
        'grad_descripcion',
        'pers_apellido_paterno',
        'pers_apellido_materno',
        'pers_nombres',
        'pers_estado_civil',
        'pers_sexo',
        'sangre',
        'pers_fecha_nacimiento',
        'espe_cod',
        'espe_descripcion', 
        'espe_abreviacion',
        'unid_cod',
        'unid_descricion',
        'unid_abreviatura',
        'tipo_sangre_id',
        'pers_ci',
        'pers_ci_complemento',
        'pers_expedido',
        'pers_carnet_militar',
        'pers_carnet_cosmil',
        'unidad_id',
        'coduni',
        'cargo_id',
        'codcar',
        'pers_fecha_alta',
        'escalafon_id',
        'codescal',
        'instituto_id',
        'codinst',
        'profesion_id',
        'codprof',
        'arma_id_origen',
        'armaori',
        'situacion_id',
        'codsit',
        'convo',
        'pers_fecha_baja',
        'pers_fecha_reincorporacion',
        'pers_numero_documento_baja',
        'pers_fecha_ascenso',
        'pers_puesto',
        'pers_entre',
        'pers_codigo_anterior',
        'pers_estudiante_militar',
        'ref1',
        'ref2',
        'ref3',
        'ref4',
        'usralt',
        'falta',
        'usrupd',
        'fupd',
    ];

    /**
     * Relación: Una persona tiene muchos CargoDestinos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargoDestinos() {
        return $this->hasMany(CargoDestino::class);
    }

    /**
     * Relación: Una persona tiene muchos DisciplinaDemeritos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function disciplinaDemeritos() {
        return $this->hasMany(DisciplinaDemerito::class);
    }

    /**
     * Relación: Una persona tiene muchas Felicitaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function felicitaciones() {
        return $this->hasMany(Felicitacion::class);
    }

    /**
     * Relación: Una persona tiene muchos InstitutoMilitares.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function institutoMilitares() {
        return $this->hasMany(InstitutoMilitar::class);
    }

    /**
     * Relación: Una persona tiene muchas ProfesionLibre.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profesionLibres() {
        return $this->hasMany(ProfesionLibre::class);
    }

    /**
     * Relación: Una persona tiene muchas FojasConceptos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fojaConceptos() {
        return $this->hasMany(ProfesionLibre::class);
    }

    /**
     * Relación: Una persona pertenece a un TipoCargo.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoCargo() {
        return $this->belongsTo(TipoCargo::class);
    }
}
