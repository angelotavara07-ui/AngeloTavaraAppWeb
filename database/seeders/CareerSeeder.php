<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Career::create(['name'=> 'Desarrollo de Software']);
        Career::create(['name'=> 'Diseño Grafico']);
        Career::create(['name'=> 'Administración Industrial']);
        Career::create(['name'=> 'Ingenieria Ambiental']);
        Career::create(['name'=> 'Ingenieria de Sistemas']);
        Career::create(['name'=> 'Informatica y Desarrollo de Aplicaciones web']);
        Career::create(['name'=> 'Artes']);
        Career::create(['name'=> 'Quimica Industrial']);
        Career::create(['name'=> 'Arquitectura']);
        Career::create(['name'=> 'Ingenieria de sistemas con AI']);
    }
}
