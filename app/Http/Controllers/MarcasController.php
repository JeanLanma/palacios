<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Titulares;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marcas::paginate(5);

        return view('admin.marcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $titular = Titulares::find($request->titular_id);
        return view('admin.registrar-marca', compact('titular'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'titular_id' => 'required',
            'denominacion_marca' => 'required',
            'tipo_de_marca' => 'required',
            'numero_expediente' => 'required',
            'fecha_legal' => 'required',
            'clase' =>' required',
            'descripcion_clase' => 'required',

            'imagen_logo' => 'nullable|image|mimes:jpeg,jpg,gif|max:1024',
            'fecha_consecion' => 'nullable',
            'numero_marca' => 'nullable',
            'fecha_primer_uso' => 'nullable',
            'fecha_renovacion' => 'nullable',
            'numero_de_oficina' => 'nullable',
            'comentarios' => 'nullable',
            'fecha_de_comprobacion' => 'nullable',
            'status_de_marca' => 'nullable',
            'proximo_tramite' => 'nullable',
            'fecha_proximo_tramite' => 'nullable',
            
            'responsable_marca' => 'nullable|string',
            'responsable_puesto' => 'nullable|string',
            'responsable_calle' => 'nullable|string',
            'responsable_telefono' => 'nullable',
            'responsable_correo' => 'nullable|email',
            'responsable_colonia' => 'nullable',
            'responsable_cp' => 'nullable',
            'responsable_municipio' => 'nullable|string',
        ]);

        if(isset($data['logo'])){
            $imgLogoName = $request->file('logo')->getClientOriginalName();
            $imgLogoRoute = $request->file('logo')->storeAs('logos', $imgLogoName, 'public');
        }


        Marcas::create([
        'titular_id' => $request['titular_id'],
        
        'denominacion_marca' => $request['denominacion_marca'],
        'descripcion_clase' => $request['descripcion_clase'],
        'tipo_de_marca' => $request['tipo_de_marca'],
        'numero_expediente' => $request['numero_expediente'],
        'imagen_logo' => $imgLogoRoute ?? 'no image',
        'fecha_legal' => $request['fecha_legal'],
        'fecha_consecion' => $request['fecha_consecion'],
        'numero_marca' => $request['numero_marca'],
        'clase' => $request['clase'],
        'fecha_primer_uso' => $request['fecha_primer_uso'],
        'fecha_renovacion' => $request['fecha_renovacion'],
        'numero_de_oficina' => $request['numero_de_oficina'] ?? null,
        'comentarios' => $request['comentarios'],
        'fecha_de_comprobacion' => $request['fecha_de_comprobacion'],
        'status_de_marca' => $request['status_de_marca'],
        'proximo_tramite' => $request['proximo_tramite'],
        'fecha_proximo_tramite' => $request['fecha_proximo_tramite'],

        'responsable_marca' => $request['responsable_marca'],
        'responsable_puesto' => $request['responsable_puesto'],
        'responsable_calle' => $request['responsable_calle'],
        'responsable_telefono' => $request['responsable_telefono'],
        'responsable_correo' => $request['responsable_correo'],
        'responsable_colonia' => $request['responsable_colonia'],
        'responsable_cp' => $request['responsable_cp'],
        'responsable_municipio' => $request['responsable_municipio'] ?? null
        ]);

        return redirect()->back()->with(['msg'=>'Registro Agregado exitosamente!', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function show(Marcas $marcas, $id)
    {
        $marca = Marcas::find($id);
        return response($marca);
    }
    public function showAll()
    {
        $marca = Marcas::all();
        return response($marca);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function edit(Marcas $marcas, $id)
    {
        $marca = Marcas::find($id);
        $titular = Titulares::find($marca->titular_id);
        return view('admin.edit', compact(['marca', 'titular']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marcas $marcas, $id)
    {
        $marca = Marcas::find($id);

        $data = $request->validate([
            'imagen_logo' => 'nullable|image|mimes:jpeg,jpg,gif|max:1024',
        ]);
        
        if(isset($data['imagen_logo'])){
            Storage::delete('logos/' . $marca->imagen_logo);
            $imgLogoName = $request->file('imagen_logo')->getClientOriginalName();
            $imgLogoRoute = $request->file('imagen_logo')->storeAs('logos', $imgLogoName, 'public');

            $marca->imagen_logo = $imgLogoRoute;
        }

        $validations = request()->validate([
            'denominacion_marca' => 'required',
            'descripcion_clase' => 'required',
            'tipo_de_marca' => 'required',
            'fecha_legal' => 'required',
            'numero_expediente' => 'required',
            'clase' => 'required',
            'responsable_marca' => 'required',
        ]);

        // Obligatorios
        $marca->denominacion_marca = $request['denominacion_marca'];
        $marca->descripcion_clase = $request['descripcion_clase'];
        $marca->tipo_de_marca = $request['tipo_de_marca'] ;
        $marca->fecha_legal = $request['fecha_legal'];        
        $marca->numero_expediente = $request['numero_expediente'];
        $marca->clase = $request['clase'];

        $marca->numero_marca = $request['numero_marca'];
        $marca->fecha_consecion = $request['fecha_consecion'];
        $marca->fecha_primer_uso = $request['fecha_primer_uso'];
        $marca->fecha_renovacion = $request['fecha_renovacion'];
        $marca->numero_de_oficina = $request['numero_de_oficina'];
        $marca->comentarios = $request['comentarios'];
        $marca->fecha_de_comprobacion = $request['fecha_de_comprobacion'];
        $marca->status_de_marca = $request['status_de_marca'];
        $marca->proximo_tramite = $request['proximo_tramite'];
        $marca->fecha_proximo_tramite = $request['fecha_proximo_tramite'];

        // Obligatorio
        $marca->responsable_marca = $request['responsable_marca'] ?? '';

        $marca->responsable_puesto = $request['responsable_puesto'];
        $marca->responsable_telefono = $request['responsable_telefono'] ?? '';
        $marca->responsable_correo = $request['responsable_correo'] ?? '';
        $marca->responsable_calle = $request['responsable_calle'] ?? '';
        $marca->responsable_colonia = $request['responsable_colonia'] ?? '';
        $marca->responsable_cp = $request['responsable_cp'] ?? '';
        $marca->responsable_municipio = $request['responsable_municipio'] ?? '';
        
        $marca->updated_at = Carbon::now();

        $marca->save();

        return back()->with(['msg'=>'Actualizado Exitosamente!', 'alert-type' => 'info']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marcas::find($id);

        Storage::delete('marcas/' . $marca->img_tipo_marca);
        Storage::delete('logos/' . $marca->img_tipo_marca);
        $marca->delete();

        return back();
    }
}
