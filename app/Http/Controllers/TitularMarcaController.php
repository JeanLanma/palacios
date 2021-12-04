<?php

namespace App\Http\Controllers;

use App\Models\TitularMarca;
use Illuminate\Http\Request;

class TitularMarcaController extends Controller
{

    //index
    public function index(){
        return view('admin.titular');
    }
    // Create a New Entity
    public function store(Request $request){
        $data = $request->validate([
            'nombre' => ['required'],
            'correo' => ['required'],
            'rfc' => ['required'],
            'facturar' => ['required'],
            'domicilio_fiscal' => ['required'],
            'telefono' => ['required'],
        ]);

        TitularMarca::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'rfc' => $data['rfc'],
            'facturar' => $data['facturar'],
            'domicilio_fiscal' => $data['domicilio_fiscal'],
            'telefono_1' => $data['telefono'],
        ]);

        return redirect()->back()->with(['success'=>'Registro Agregado exitosamente!']);
    }
}
