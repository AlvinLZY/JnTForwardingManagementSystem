<?php
//author:Sing Wei Hern
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['username'=>'admin','firstName'=>'system',
            'lastName'=>'admin', 'email'=>'admin@admin.com','contactNo'=>'0123456789', 'password'=> bcrypt('adminpass'),'is_permission'=> 1]);
    }
}
