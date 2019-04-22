<?php

use App\Division;
use Illuminate\Database\Seeder;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $division = new Division();
        $division->description = 'Electronica, Computacion e Informatica';
        $division->save();

        $division = new Division();
        $division->description = 'Ciencias Basicas';
        $division->save();

    }
}
