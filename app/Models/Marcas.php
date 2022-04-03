<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Marcas extends Model
{
    use HasFactory;

    protected $fillable = [
        'denominacion_marca',
        'titular_id',
        'tipo_de_marca',
        'tipo_de_clase',
        'status_de_marca',
        'imagen_logo',
        'numero_expediente',
        'fecha_legal',
        'fecha_consecion',
        'numero_marca',
        'clase',
        'tipo_clase',
        'descripcion_clase',
        'fecha_primer_uso',
        'fecha_renovacion',
        'numero_de_oficina',
        'comentarios',
        'fecha_de_comprobacion',
        'proximo_tramite',
        'fecha_proximo_tramite',
        'responsable_marca',
        'responsable_puesto',
        'responsable_calle',
        'responsable_telefono',
        'responsable_correo',
        'responsable_colonia',
        'responsable_cp',
        'responsable_municipio',
    ];

    public function getTitularAttribute(){
        return DB::table('titulares')->where('id', $this->titular_id)->first(['titular_nombre']);
    }

    protected $appends = ['titular'];

}
