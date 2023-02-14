<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;


class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superUser = User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12341234'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        Role::create([
            'name'=>'super-user',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);

        $superUser->assignRole('super-user');
    }
}
