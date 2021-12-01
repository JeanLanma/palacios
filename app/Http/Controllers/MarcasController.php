<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $marcas = Marcas::paginate(2);
        // return $marcas;

        return view('admin.marcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'denominacion_marca' => 'required',
            'imagen_logo' => 'nullable|image|mimes:jpeg,jpg,gif|max:1024',
            'tipo_de_marca' => 'required',
            'descripcion_clase' => 'required',
            'numero_expediente' => 'required',
            'fecha_legal' => 'required',
            'fecha_consecion' => 'required',
            'numero_marca' => 'required',
            'clase' =>' required',
            'fecha_primer_uso' => 'nullable',
            'fecha_renovacion' => 'required',
            'numero_oficina' => 'required',
            'comentarios' => 'required',
            'fecha_comprobacion' => 'required',
            'status_de_marca' => 'required',
            'proximo_tramite' => 'required',
            'fecha_proximo_tramite' => 'required',
            'titular_marca' => 'required',
            'titular_telefono' => 'required',
            'titular_correo' => 'required',
            'responsable_marca' => 'required',
            'responsable_puesto' => 'required',
            'responsable_calle' => 'required',
            'responsable_telefono' => 'required',
            'responsable_correo' => 'required',
            'responsable_colonia' => 'required',
            'responsable_cp' => 'required',
            'responsable_municipio' => 'required',
        ]);
        // dd($data);

        if(isset($data['logo'])){
            $imgLogoName = $request->file('logo')->getClientOriginalName();
            $imgLogoRoute = $request->file('logo')->storeAs('logos', $imgLogoName, 'public');
        }


        Marcas::create([
        'denominacion_marca' => $request['denominacion_marca'],
        'descripcion_clase' => $request['descripcion_clase'],
        'tipo_de_marca' => $request['tipo_de_marca'],
        'numero_expediente' => $request['numero_expediente'],
        'imagen_logo' => $imgLogoRoute ?? 'no image',
        'fecha_legal' => $request['fecha_legal'],
        'fecha_consecion' => $request['fecha_consecion'],
        'numero_marca' => $request['numero_marca'],
        'clase' => $request['clase'],
        'tipo_clase' => $request['tipo_clase'],
        'fecha_primer_uso' => $request['fecha_primer_uso'],
        'fecha_renovacion' => $request['fecha_renovacion'],
        'numero_oficina' => $request['numero_oficina'],
        'comentarios' => $request['comentarios'],
        'fecha_comprobacion' => $request['fecha_comprobacion'],
        'status_de_marca' => $request['status_de_marca'],
        'proximo_tramite' => $request['proximo_tramite'],
        'fecha_proximo_tramite' => $request['fecha_proximo_tramite'],
        'titular_marca' => $request['titular_marca'],
        'titular_telefono' => $request['titular_telefono'],
        'titular_correo' => $request['titular_correo'],
        'responsable_marca' => $request['responsable_marca'],
        'responsable_puesto' => $request['responsable_puesto'],
        'responsable_calle' => $request['responsable_calle'],
        'responsable_telefono' => $request['responsable_telefono'],
        'responsable_correo' => $request['responsable_correo'],
        'responsable_colonia' => $request['responsable_colonia'],
        'responsable_cp' => $request['responsable_cp'],
        'responsable_municipio' => $request['responsable_municipio'],
        ]);

        return redirect()->back()->with(['success'=>'Registro Agregado exitosamente!']);;
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
        return view('admin.edit', compact('marca'));
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

        $marca->denominacion_marca = $request['denominacion_marca'] ?? '';
        $marca->descripcion_clase = $request['descripcion_clase'] ?? '';
        $marca->tipo_de_marca = $request['tipo_de_marca'] ?? '';
        $marca->numero_expediente = $request['numero_expediente'] ?? '';
        $marca->fecha_legal = $request['fecha_legal'] ?? '';        
        $marca->numero_marca = $request['numero_marca'] ?? '';
        $marca->fecha_consecion = $request['fecha_consecion'] ?? '';
        $marca->clase = $request['clase'] ?? '';
        $marca->tipo_clase = $request['tipo_clase'] ?? '';
        $marca->fecha_primer_uso = $request['fecha_primer_uso'];
        $marca->fecha_renovacion = $request['fecha_renovacion'] ?? '';
        $marca->numero_oficina = $request['numero_oficina'] ?? '';
        $marca->comentarios = $request['comentarios'] ?? '';
        $marca->fecha_comprobacion = $request['fecha_comprobacion'] ?? '';
        $marca->titular_marca = $request['titular_marca'] ?? '';
        $marca->titular_telefono = $request['titular_telefono'] ?? '';
        $marca->titular_correo = $request['titular_correo'] ?? '';
        $marca->responsable_marca = $request['comentarios'] ?? '';
        $marca->responsable_puesto = $request['responsable_puesto'] ?? '';
        $marca->responsable_telefono = $request['responsable_telefono'] ?? '';
        $marca->responsable_correo = $request['responsable_correo'] ?? '';
        $marca->responsable_calle = $request['comentarios'] ?? '';
        $marca->responsable_colonia = $request['responsable_colonia'] ?? '';
        $marca->responsable_cp = $request['responsable_cp'] ?? '';
        $marca->responsable_municipio = $request['responsable_municipio'] ?? '';
        $marca->status_de_marca = $request['status_de_marca'] ?? '';
        $marca->proximo_tramite = $request['proximo_tramite'] ?? '';
        $marca->fecha_proximo_tramite = $request['fecha_proximo_tramite'] ?? '';
        $marca->updated_at = Carbon::now();

        $marca->save();

        return back()->with(['success'=>'Actualizado exitosamente!']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marcas $marcas, $id)
    {
        $marca = Marcas::find($id);

        Storage::delete('marcas/' . $marca->img_tipo_marca);
        Storage::delete('logos/' . $marca->img_tipo_marca);
        $marca->delete();

        return back();
    }
}
