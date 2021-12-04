<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TitularMarca extends Model
{
    use HasFactory;

    protected $table = 'titular_marca';

    protected $fillable = [
        'nombre',
        'correo',
        'facturar',
        'rfc',
        'domicilio_fiscal',
        'telefono_1',
        'telefono_2',
        'telefono_3',
    ];
}
