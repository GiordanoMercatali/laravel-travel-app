<?php

namespace Database\Seeders;

use App\Models\Travel;
use App\Models\Stage;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class StagesTableSeeder extends Seeder
{
    /**
     * Esegui i seeder per la tabella 'stages'.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $stages = ['Day at the beach', 'A fun hike', 'Sleeping under the palm trees', 'Relaxing under the sun'];
        $locations = ['Hawaii', 'Maldives', 'Caribbean', 'Portovenere', 'Santa Teresa', 'The Algarve', 'Mykonos', 'Maiorca', 'Tenerife'];

        
        // $travels = Travel::all();
        // $travelIds = $travels->pluck('id')->toArray();

        foreach($locations as $location){
            $stage = new Stage();
            // $stage->name = $stages[$i];
            // $stage->image = 'https://picsum.photos/id/'.$faker->numberBetween(10,17).'/400/600';
            $stage->location = $faker->randomElement($locations);
            $stage->description = $faker->text(100);
            
            // $stage->date = Carbon::parse($travel->start_date);
            
            // $stage->travel_id = $travel->id;
            // $stage->travel_id = $faker->randomElement($travelIds);
            
            $stage->save();
        }
    }
}