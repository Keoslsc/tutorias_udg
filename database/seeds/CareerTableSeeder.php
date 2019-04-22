<?php

use App\Career;
use Illuminate\Database\Seeder;

class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $career = new Career();
        $career->name = 'Ingenieria en Computacion';
        $career->division_id = '1';
        $career->save();

        $career = new Career();
        $career->name = 'Ingenieria en Informatica';
        $career->division_id = '1';
        $career->save();

        $career = new Career();
        $career->name = 'Ingenieria en Biomedica';
        $career->division_id = '1';
        $career->save();

        $career = new Career();
        $career->name = 'Licenciatura en Matematicas';
        $career->division_id = '2';
        $career->save();
    }
}
