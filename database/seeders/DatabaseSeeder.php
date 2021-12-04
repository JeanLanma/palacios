<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Marcas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(['name'=>'Test User','email'=>'test@test.com', 'password'=> Hash::make('12345678')]);
        User::create(['name'=>'Test User Beta','email'=>'mail@mail.com', 'password'=> Hash::make('123456789')]);

        DB::table('titular_marca')->insert(['nombre'=>'Jean','correo'=>'jean@jean.com','facturar'=>'Jean Sa de CV', 'rfc' =>'ABCD12345', 'domicilio_fiscal' => 'Calle 44', 'telefono_1'=>'33-1234-1234', 'created_at' => '2021-11-30', 'updated_at' => '2021-11-30']);

        Marcas::create(['titular_id' => 1, 'denominacion_marca' => 'Nueva Prueba', 'tipo_de_marca' => 'NOMINATIVO', 'imagen_logo' => 'no image', 'numero_expediente' => '100', 'fecha_legal' => '2021-11-30', 'numero_marca' => 3, 'fecha_consecion' => '2021-11-30', 'clase' =>'A1', 'tipo_clase' => '5', 'descripcion_clase' => 'Etiam non risus ut eros tristique viverra id id nulla. Mauris sed tristique justo. Aliquam erat volutpat. Etiam ultrices ultricies eros, quis maximus odio malesuada eget. Pellentesque nec maximus justo, vitae congue libero. Etiam fermentum et dui in suscipit. Vivamus vehicula, lectus a aliquet rhoncus, eros dolor tempor tortor, at rutrum ante felis non enim. Mauris convallis ligula libero, sit amet placerat felis suscipit at. Vestibulum suscipit nibh nec nunc convallis facilisis. Integer posuere vitae magna facilisis sodales. Donec ut commodo nunc, non iaculis lectus. Nullam et iaculis neque.', 'fecha_primer_uso' => '2021-11-30', 'fecha_renovacion' => '2021-11-30', 'numero_oficina' => 9, 'comentarios' => 'Comentarios de Marca de Prueba', 'fecha_comprobacion' => '2021-11-30', 'status_de_marca' => 'En tramite','proximo_tramite' => 'Nuevo Tramite', 'fecha_proximo_tramite' => '2021-11-30','responsable_marca' => 'John Doe','responsable_puesto' => 'Vendedor','responsable_telefono' => '33-1234-1234', 'responsable_correo' => 'mail1@mail.com', 'responsable_calle' => 'Paseos del Sol', 'responsable_colonia' => 'Reforma', 'responsable_cp' => '44111', 'responsable_municipio' => 'Benito Juarez']);
        Marcas::create(['titular_id' => 1,'denominacion_marca' => 'Nueva Prueba 2', 'tipo_de_marca' => 'NOMINATIVO', 'imagen_logo' => 'no image', 'numero_expediente' => '100', 'fecha_legal' => '2021-11-30', 'numero_marca' => 3, 'fecha_consecion' => '2021-11-30', 'clase' =>'A1', 'tipo_clase' => '5', 'descripcion_clase' => 'Etiam non risus ut eros tristique viverra id id nulla. Mauris sed tristique justo. Aliquam erat volutpat. Etiam ultrices ultricies eros, quis maximus odio malesuada eget. Pellentesque nec maximus justo, vitae congue libero. Etiam fermentum et dui in suscipit. Vivamus vehicula, lectus a aliquet rhoncus, eros dolor tempor tortor, at rutrum ante felis non enim. Mauris convallis ligula libero, sit amet placerat felis suscipit at. Vestibulum suscipit nibh nec nunc convallis facilisis. Integer posuere vitae magna facilisis sodales. Donec ut commodo nunc, non iaculis lectus. Nullam et iaculis neque.', 'fecha_primer_uso' => '2021-11-30', 'fecha_renovacion' => '2021-11-30', 'numero_oficina' => 10, 'comentarios' => 'Comentarios de Marca de Prueba 2', 'fecha_comprobacion' => '2021-11-30', 'status_de_marca' => 'En tramite','proximo_tramite' => 'Pagar liquidacion', 'fecha_proximo_tramite' => '2021-11-30','responsable_marca' => 'Jane Doe','responsable_puesto' => 'Director','responsable_telefono' => '33-1234-1234', 'responsable_correo' => 'mail2@mail.com', 'responsable_calle' => 'Paseos de la luna', 'responsable_colonia' => 'Independencia', 'responsable_cp' => '44222', 'responsable_municipio' => 'Iztapalapa']);
        Marcas::create(['titular_id' => 1,'denominacion_marca' => 'Nueva Prueba 3', 'tipo_de_marca' => 'NOMINATIVO', 'imagen_logo' => 'no image', 'numero_expediente' => '100', 'fecha_legal' => '2021-11-30', 'numero_marca' => 3, 'fecha_consecion' => '2021-11-30', 'clase' =>'A1', 'tipo_clase' => '5', 'descripcion_clase' => 'Etiam non risus ut eros tristique viverra id id nulla. Mauris sed tristique justo. Aliquam erat volutpat. Etiam ultrices ultricies eros, quis maximus odio malesuada eget. Pellentesque nec maximus justo, vitae congue libero. Etiam fermentum et dui in suscipit. Vivamus vehicula, lectus a aliquet rhoncus, eros dolor tempor tortor, at rutrum ante felis non enim. Mauris convallis ligula libero, sit amet placerat felis suscipit at. Vestibulum suscipit nibh nec nunc convallis facilisis. Integer posuere vitae magna facilisis sodales. Donec ut commodo nunc, non iaculis lectus. Nullam et iaculis neque.', 'fecha_primer_uso' => '2021-11-30', 'fecha_renovacion' => '2021-11-30', 'numero_oficina' => 9, 'comentarios' => 'Comentarios de Marca de Prueba 3', 'fecha_comprobacion' => '2021-11-30', 'status_de_marca' => 'En tramite','proximo_tramite' => 'Nuevo Tramite', 'fecha_proximo_tramite' => '2021-11-30','responsable_marca' => 'John Doe','responsable_puesto' => 'Repartidor','responsable_telefono' => '33-1234-1234', 'responsable_correo' => 'mail3@mail.com', 'responsable_calle' => 'Paseos del Sol', 'responsable_colonia' => 'Heros Ferrocalires', 'responsable_cp' => '44333', 'responsable_municipio' => 'Cuahutemoc']);
    }
}
