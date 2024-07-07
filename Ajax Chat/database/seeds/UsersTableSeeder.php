<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'RC_H2',
            'email' => 'rodrigochantel@gmail.com',
            'password' => bcrypt('75849352')
        ]);
    }
}
