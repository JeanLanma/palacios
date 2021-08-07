<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    use HasFactory;

    protected $fillable = [
        'denominacion_marca',
        'descripcion_clase',
        'tipo',
        'img_tipo_marca',
        'numero_expediente',
        'logo',
        'fecha_legal',
        'fecha_consecion',
        'numero_marca',
        'clase',
        'tipo_marca',
        'fecha_primer_uso',
        'fecha_renovacion',
        'numero_oficina',
        'comentarios',
        'fecha_comprobacion',
        'titular_marca',
        'titular_telefono',
        'titular_correo',
        'responsable_marca',
        'responsable_puesto',
        'responsable_calle',
        'responsable_telefono',
        'responsable_correo',
        'responsable_colonia',
        'responsable_cp',
        'responsable_municipio',
    ];
}
