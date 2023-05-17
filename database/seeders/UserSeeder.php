<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Generator::class);
        $data = [];
        for ($i=0; $i < 100; $i++) {
            $arr = ['id' => $i+1, 'name' => $faker->name() , 'Fk_department' =>rand(1, 4) , 'Fk_designation' =>     rand(1,8), 'phone_number' => rand(90000000000, 9999999999)];
            array_push($data, $arr);
        }
        User::insert($data);
    }
}
