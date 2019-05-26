<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = new Module();
        $module->name = 'Ecuaciones Diferenciales Ordinarias';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Algoritmia';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Programacion I';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Programacion II';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Programacion III';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Metodos Matematicos I';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Metodos Matematicos II';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Metodos Matematicos III';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Estructuras de datos I';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Simulacion por computadora';
        $module->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Matematicas I';
        $module->division_id = '2';
        $module->save();

        $module = new Module();
        $module->name = 'Matematicas II';
        $module->division_id = '2';
        $module->save();

        $module = new Module();
        $module->name = 'Matematicas III';
        $module->division_id = '2';
        $module->save();
    }
}
