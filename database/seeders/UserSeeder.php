<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Location;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//organization id name
//user id name email password organization_id(fk)
    public function run()
    {
        $user = USER::where('email', 'user1@example.com')->first();
        if(!$user){
            $user = new User();
            $user->name = 'Owner';
            $user->email = 'user1@example.com';
            $user->password = Hash::make('userpass');
            $user->role = 'OWNER';
            $user->save();
        }


        $user = USER::where('email', 'user2@example.com')->first();
        if(!$user){
            $user = new User();
            $user->name = 'Employee';
            $user->email = 'user2@example.com';
            $user->password = Hash::make('userpass');
            $user->role = 'EMPLOYEE';
            $user->save();
        }

        $user = USER::where('email', 'user3@example.com')->first();
        if(!$user){
            $user = new User();
            $user->name = 'Delivery';
            $user->email = 'user3@example.com';
            $user->password = Hash::make('userpass');
            $user->role = 'DELIVERY';
            $user->save();
        }

    }
}
