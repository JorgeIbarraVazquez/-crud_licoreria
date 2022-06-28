<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $arreglo=range(1,5);

        foreach ($arreglo as $prov){
            DB::table('proveedors')->insert([
                'nombre_empresa' => 'Proveedor '.$prov,
                'RFC'=>Str::random(12),
                'telefono' => rand(00000000,99999999),
                'domicilio' => 'Domicilio Proveedor '.$prov,
            ]);
        }

        $faker=\Faker\Factory::create();
        $id_proveedores=DB::table('proveedors')->pluck('id');
        $productos=range(1,10);

        foreach ($productos as $prod){
            DB::table('productos')->insert([
                'descripcion' => 'Desc Prod '.$prod,
                'cantidad'=>rand(0,200),
                'precio' => rand(1,500),
                'id_proveedor' =>  $faker->randomElement($id_proveedores),
            ]);
        }
    }
}
