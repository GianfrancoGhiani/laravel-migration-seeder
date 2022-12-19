<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Train;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create new trains
        $newTrain = new Train;
        $newTrain->company = 'pippo';
        $newTrain->leaving_from = 'pippo';
        $newTrain->arriving_to ='pippo' ;
        $newTrain->leaving_time = 2022-12-19;
        $newTrain->arriving_time = 2022-12-19;
        $newTrain->train_code = 12312312312;
        $newTrain->wagons_num = 123;
        $newTrain->on_time = true;
        $newTrain->deleted = false;
        $newTrain->save();
        dd($newTrain);
    }
}
