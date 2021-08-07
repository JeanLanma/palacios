<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcas', function (Blueprint $table) {
            $table->id();
            $table->text('denominacion_marca');
            $table->text('descripcion_clase');
            $table->text('tipo');
            $table->text('numero_expediente');
            $table->text('fecha_legal');
            $table->text('logo');
            $table->integer('numero_marca');
            $table->date('fecha_consecion');
            $table->text('clase');
            $table->text('tipo_marca');
            $table->date('fecha_primer_uso');
            $table->date('fecha_renovacion');
            $table->integer('numero_oficina');
            $table->text('comentarios');
            $table->date('fecha_comprobacion');
            $table->text('titular_marca');
            $table->text('titular_telefono');
            $table->text('titular_correo');
            $table->text('responsable_marca');
            $table->text('responsable_puesto');
            $table->text('responsable_telefono');
            $table->text('responsable_correo');
            $table->text('responsable_calle');
            $table->text('responsable_colonia');
            $table->text('responsable_cp');
            $table->text('responsable_municipio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcas');
    }
}
