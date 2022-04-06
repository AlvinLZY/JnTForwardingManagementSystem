<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\staff;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        staff::create(['username'=>'admin','staffFirstName'=>'system','staffLastName'=>'admin', 'email'=>'admin@admin.com','contactNo'=>'0123456789', 'password'=> bcrypt('adminpass')]);
    }
}
