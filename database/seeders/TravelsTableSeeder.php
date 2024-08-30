<?php

namespace Database\Seeders;

use App\Models\Travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TravelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
            $titles = [
                'Summer Vacations 24',
                'sUmMeR 2k24!',
                'Family Trip 2024',
                'My Latest Travel.',
                'Best Journey of my Life!'
            ];

            $startDate = Carbon::create(2024, 6, 1);
            $endDate = Carbon::create(2024, 8, 31);
        
            for($i=0; $i<4; $i++){
                $travel = new Travel();
                $travel->title = $titles[$i];
                $travel->cover_image = 'https://picsum.photos/id/'.$faker->numberBetween(10,17).'/400/600';
                $travel->description = $faker->text(100);
                
                $randomStartDate = $this->getRandomDate($startDate, $endDate);
                $travel->start_date = $randomStartDate;

                $randomEndDate = $this->getRandomDate(Carbon::parse($randomStartDate), $endDate);
                $travel->end_date = $randomEndDate;

                $travel->rating = $faker->numberBetween(1,5);
                $travel->save();
            }
    }

    private function getRandomDate(Carbon $startDate, Carbon $endDate)
    {
        
        if ($startDate > $endDate) {
            $temp = $startDate;
            $startDate = $endDate;
            $endDate = $temp;
        }
        
        $randomTimestamp = mt_rand($startDate->timestamp, $endDate->timestamp);

        return Carbon::createFromTimestamp($randomTimestamp)->toDateString();
    }
}