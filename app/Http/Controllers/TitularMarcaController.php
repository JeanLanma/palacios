<?php

namespace App\Http\Controllers;

use App\Models\TitularMarca;
use Illuminate\Http\Request;

class TitularMarcaController extends Controller
{

    public function index(){
        return view('admin.titular');
    }
    //Titular Selection
    public function titularSelection(Request $request){
        $titulares = TitularMarca::all();
        return view('admin.select-titular', compact('titulares'));
    }
    //Main table
    public function show(){
        $titulares = TitularMarca::paginate(5);
        return view('admin.titulares', compact('titulares'));
    }
    // Adding New register to DataBase
    public function store(Request $request){
        $data = $request->validate([
            'nombre' => ['required'],
            'correo' => ['required'],
            'rfc' => ['required'],
            'facturar' => ['required'],
            'domicilio_fiscal' => ['required'],
            'telefono_1' => ['required'],
        ]);

        TitularMarca::create([
            'nombre' => $data['nombre'],
            'correo' => $data['correo'],
            'rfc' => $data['rfc'],
            'facturar' => $data['facturar'],
            'domicilio_fiscal' => $data['domicilio_fiscal'],
            'telefono_1' => $data['telefono_1'],
            'telefono_2' => $request['telefono_2'] ?? null,
            'telefono_3' => $request['telefono_3'] ?? null,
        ]);

        return back()->with(['msg'=>'Registro Creado Existosamente!', 'alert-type' => 'success']);;
    }

    /* Edit an Specific Resource */
    public function edit(TitularMarca $titular){
        return view('admin.update-titular', compact('titular'));
    }
    /* Update an Specific Resource */
    public function update(Request $request, $id){
        $titular = TitularMarca::find($id);

        $titular->nombre = $request['nombre'];
        $titular->telefono_1 = $request['telefono_1'];
        $titular->correo = $request['correo'];
        $titular->facturar = $request['facturar'];
        $titular->rfc = $request['rfc'];
        $titular->domicilio_fiscal = $request['domicilio_fiscal'];
        $titular->telefono_2 = $request['telefono_2'] ?? null;
        $titular->telefono_3 = $request['telefono_3'] ?? null;

        $titular->save();

        return back()->with(['msg'=>'Actualizado Exitosamente!', 'alert-type' => 'info']);
    }
    
    public function destroy($id){
        $titular = TitularMarca::find($id);
        $titular->delete();
        
        return back()->with(['msg'=>'Registro Elimininado!', 'alert-type' => 'warning']);
        
    }
}
