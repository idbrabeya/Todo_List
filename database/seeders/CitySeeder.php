<?php

namespace Database\Seeders;
use App\Models\City;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts=[
               [
                'state_id'=>'1',
                'name'=> 'One',

               ],
               [
                'state_id'=>'2',
                'name'=> 'Two',

               ],
               [
                'state_id'=>'3',
                'name'=> 'Three',

               ],
        ];
        foreach ($posts as $post) {
            City::create($post);
        }
    }
}
