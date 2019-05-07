<?php

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
        $modeule->division_id = '1';
        $module->save();

        $module = new Module();
        $module->name = 'Algoritmia';
        $module->division_id = '1';
        $module->save();
    }
}
