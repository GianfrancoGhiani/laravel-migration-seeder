<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Generator as Faker;
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
    public function run(Faker $faker)
    {
        $now = Carbon::now('0');
        // create new trains
        for ($i=0; $i<1000; $i++){
            $newTrain = new Train;
            $newTrain->company = $faker->word();
            $newTrain->leaving_from = $faker->city() ;
            $newTrain->arriving_to = $faker->city() ;
            $newTrain->leaving_time = $faker->time();
            $leaving = Carbon::createFromTimeString($newTrain->leaving_time);
            $arriving = $leaving->addHours($faker->numberBetween(0, 12));
            $arriving = $leaving->addMinutes($faker->numberBetween(0, 59));
            $arriving = $leaving->addSeconds($faker->numberBetween(0, 59));
            $newTrain->arriving_time = $arriving;
            //problem: it doesnt work only on days, es: year 2148
            $newTrain->day_of_leaving = $now->addDays($faker->numberBetween(0, 90));
            $newTrain->train_code = $faker->unique()->randomNumber(6, true);
            $newTrain->wagons_num = $faker->numberBetween(0, 100);
            $newTrain->on_time = $faker->numberBetween(0, 1);
            $newTrain->deleted = $faker->numberBetween(0, 1);
            $newTrain->save();
        }
        dd($now->date);
    }
}
