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
        $marcas = Marcas::all();

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
            'img_tipo_marca' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048',
        ]);



        if(isset($data['img_tipo_marca'])){
            $imgTipoMarcaName = $request->file('img_tipo_marca')->getClientOriginalName();
            $imgTipoMarcaRoute = $request->file('img_tipo_marca')->storeAs('marcas', $imgTipoMarcaName, 'public');
        }
        if(isset($data['logo'])){
            $imgLogoName = $request->file('logo')->getClientOriginalName();
            $imgLogoRoute = $request->file('logo')->storeAs('logos', $imgLogoName, 'public');
        }


        Marcas::create([
        'denominacion_marca' => $request['denominacion_marca'],
        'descripcion_clase' => $request['descripcion_clase'],
        'tipo' => $request['tipo'],
        'img_tipo_marca' => $imgTipoMarcaRoute ?? 'Nominativo',
        'numero_expediente' => $request['numero_expediente'],
        'logo' => $imgLogoRoute ?? 'no image',
        'fecha_legal' => $request['fecha_legal'],
        'fecha_consecion' => $request['fecha_consecion'],
        'numero_marca' => $request['numero_marca'],
        'clase' => $request['clase'],
        'tipo_marca' => $request['tipo_marca'],
        'fecha_primer_uso' => $request['fecha_primer_uso'],
        'fecha_renovacion' => $request['fecha_renovacion'],
        'numero_oficina' => $request['numero_oficina'],
        'comentarios' => $request['comentarios'],
        'fecha_comprobacion' => $request['fecha_comprobacion'],
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

        return redirect()->back();
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
            'img_tipo_marca' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,jpg,gif|max:2048',
        ]);

        if(isset($data['img_tipo_marca'])){
            Storage::delete('marcas' . $marca->img_tipo_marca);
            $imgTipoMarcaName = $request->file('img_tipo_marca')->getClientOriginalName();
            $imgTipoMarcaRoute = $request->file('img_tipo_marca')->storeAs('marcas', $imgTipoMarcaName, 'public');

            $marca->img_tipo_marca = $imgTipoMarcaRoute;
        }
        if(isset($data['logo'])){
            Storage::delete('logos' . $marca->logo);
            $imgLogoName = $request->file('logo')->getClientOriginalName();
            $imgLogoRoute = $request->file('logo')->storeAs('logos', $imgLogoName, 'public');

            $marca->logo = $imgLogoRoute;
        }

        $marca->denominacion_marca = $request['denominacion_marca'];
        $marca->descripcion_clase = $request['descripcion_clase'];
        $marca->tipo = $request['tipo'];
        $marca->numero_expediente = $request['numero_expediente'];
        $marca->fecha_legal = $request['fecha_legal'];        
        $marca->numero_marca = $request['numero_marca'];
        $marca->fecha_consecion = $request['fecha_consecion'];
        $marca->clase = $request['clase'];
        $marca->tipo_marca = $request['tipo_marca'];
        $marca->fecha_primer_uso = $request['fecha_primer_uso'];
        $marca->fecha_renovacion = $request['fecha_renovacion'];
        $marca->numero_oficina = $request['numero_oficina'];
        $marca->comentarios = $request['comentarios'];
        $marca->fecha_comprobacion = $request['fecha_comprobacion'];
        $marca->titular_marca = $request['titular_marca'];
        $marca->titular_telefono = $request['titular_telefono'];
        $marca->titular_correo = $request['titular_correo'];
        $marca->responsable_marca = $request['comentarios'];
        $marca->responsable_puesto = $request['responsable_puesto'];
        $marca->responsable_telefono = $request['responsable_telefono'];
        $marca->responsable_correo = $request['responsable_correo'];
        $marca->responsable_calle = $request['comentarios'];
        $marca->responsable_colonia = $request['responsable_colonia'];
        $marca->responsable_cp = $request['responsable_cp'];
        $marca->responsable_municipio = $request['responsable_municipio'];
        $marca->updated_at = Carbon::now();

        $marca->save();

        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marcas  $marcas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marcas $marcas)
    {
        //
    }
}
