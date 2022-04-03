<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitularMarcaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titulares', function (Blueprint $table) {
            $table->id();
            $table->text('titular_nombre');
            $table->text('correo');
            $table->text('facturar');
            $table->text('rfc')->nullable();
            $table->text('domicilio_fiscal');
            $table->text('telefono_1')->nullable();
            $table->text('telefono_2')->nullable();
            $table->text('domicilio_titular')->nullable();
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
        Schema::dropIfExists('titulares');
    }
}
