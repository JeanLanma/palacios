<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

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
        Marcas::create([
        'denominacion_marca' => $request['denominacion_marca'],
        'descripcion_clase' => $request['descripcion_clase'],
        'tipo' => $request['tipo'],
        'img_tipo_marca' => $request['img_tipo_marca'] ?? 'Nominativo',
        'numero_expediente' => $request['numero_expediente'],
        'logo' => $request['logo'] ?? 'no image',
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
    public function show(Marcas $marcas)
    {
        //
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
    public function update(Request $request, Marcas $marcas)
    {
        //
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
