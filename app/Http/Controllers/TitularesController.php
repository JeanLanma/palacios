<?php

namespace App\Http\Controllers;

use App\Models\Titulares;
use Illuminate\Http\Request;

class TitularesController extends Controller
{

    public function index(){
        return view('admin.titular');
    }
    //Titular Selection
    public function titularSelection(){
        $titulares = Titulares::all();
        return view('admin.select-titular', compact('titulares'));
    }
    //Main table
    public function show(){
        $titulares = Titulares::paginate(5);
        return view('admin.titulares', compact('titulares'));
    }
    // Adding New register to DataBase
    public function store(Request $request){
        $data = $request->validate([
            'titular_nombre' => ['required'],
            'correo' => ['required'],
            'facturar' => ['required'],
            'domicilio_fiscal' => ['required'],
        ]);

        Titulares::create([
            'titular_nombre' => $data['titular_nombre'],
            'correo' => $data['correo'],
            'facturar' => $data['facturar'],
            'domicilio_fiscal' => $data['domicilio_fiscal'],
            'rfc' => $data['rfc'] ?? null,
            'telefono_1' => $data['telefono_1']  ?? null,
            'telefono_2' => $request['telefono_2'] ?? null,
            'domicilio_titular' => $request['domicilio_titular'] ?? null,
        ]);

        return back()->with(['msg'=>'Registro Creado Existosamente!', 'alert-type' => 'success']);;
    }

    /* Edit an Specific Resource */
    public function edit(Titulares $titular){
        return view('admin.update-titular', compact('titular'));
    }
    /* Update an Specific Resource */
    public function update(Request $request, $id){

        $data = $request->validate([
            'titular_nombre' => ['required'],
            'correo' => ['required'],
            'facturar' => ['required'],
            'domicilio_fiscal' => ['required'],
        ]);

        $titular = Titulares::find($id);

        $titular->titular_nombre = $request['titular_nombre'];
        $titular->correo = $request['correo'];
        $titular->facturar = $request['facturar'];
        $titular->domicilio_fiscal = $request['domicilio_fiscal'];
        $titular->telefono_1 = $request['telefono_1'] ?? null;
        $titular->rfc = $request['rfc'] ?? null;
        $titular->telefono_2 = $request['telefono_2'] ?? null;
        $titular->domicilio_titular = $request['domicilio_titular'] ?? null;

        $titular->save();

        return back()->with(['msg'=>'Actualizado Exitosamente!', 'alert-type' => 'info']);
    }
    
    public function destroy($id){
        $titular = TitularMarca::find($id);
        $titular->delete();
        
        return back()->with(['msg'=>'Registro Elimininado!', 'alert-type' => 'warning']);
        
    }
}
