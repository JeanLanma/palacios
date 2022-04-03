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
            $table->unsignedBigInteger('titular_id');
            $table->text('denominacion_marca');
            $table->text('tipo_de_marca');
            $table->text('imagen_logo');
            $table->text('numero_expediente');
            $table->text('fecha_legal');
            $table->integer('numero_marca');
            $table->date('fecha_consecion');
            $table->text('clase');
            $table->text('descripcion_clase');
            $table->date('fecha_primer_uso')->nullable('0000-00-00');
            $table->date('fecha_renovacion');
            $table->integer('numero_de_oficina');
            $table->text('comentarios');
            $table->date('fecha_de_comprobacion');
            $table->text('status_de_marca');
            $table->text('proximo_tramite');
            $table->text('fecha_proximo_tramite');
            
            $table->text('responsable_marca');
            $table->text('responsable_puesto');
            $table->text('responsable_telefono');
            $table->text('responsable_correo');
            $table->text('responsable_calle');
            $table->text('responsable_colonia');
            $table->text('responsable_cp');
            $table->text('responsable_municipio');

            $table->timestamps();

            $table->foreign('titular_id')
            ->references('id')
            ->on('titulares')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->dropForeign(['titular_id']);
        });
        Schema::dropIfExists('marcas');
    }
}
