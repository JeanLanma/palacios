<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulares extends Model
{
    use HasFactory;

    protected $table = 'titulares';

    protected $fillable = [
        'titular_nombre',
        'correo',
        'facturar',
        'rfc',
        'domicilio_fiscal',
        'telefono_1',
        'telefono_2',
        'domicilio_titular',
    ];
}
