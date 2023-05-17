<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $dpt = [
            ['id'=>1, 'name' => 'HR'],
            ['id'=>2,'name' => 'Technical'],
            ['id'=>3,'name' => 'Accounts'],
            ['id'=>4,'name' => 'Management']
        ];

        $des = [
            ['id'=>1, 'name' => 'Hr'],
            ['id'=>2,'name' => 'Tech lead'],
            ['id'=>3,'name' => 'Opertion Manager'],
            ['id'=>4,'name' => 'Project Manager'],
            ['id'=>5,'name' => 'Quality Analyst'],
            ['id'=>6,'name' => 'Accountant'],
            ['id'=>7,'name' => 'Developer'],
            ['id'=>8,'name' => 'Manager'],
        ];

        Department::insert($dpt);
        Designation::insert($des);
    }
}
