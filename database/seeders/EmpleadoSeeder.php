<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
            Empleado::create([
                'identidad' => $i,
                'primer_nombre'=> '',
                'segundo_nombre'=> '',
                'primer_apellido'=> '',
                'segundo_apellido'=> '',
                'fecha_nacimiento'=>'1995-01-29',
                'numero_telefono'=>0,
                'fecha_entrada'=>'2021-01-29',
                'correo_electronico'=>$i,
                'direccion'=>'',
                'cargo'=>'',
                'numero_emergencia'=>0,
            ]);
        }
    }
}
