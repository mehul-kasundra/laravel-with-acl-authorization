<?php

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
        DB::table('users')->insert([
            'username' => 'root',
            'first_name' => 'Root',
            'last_name' => 'SuperUser',
            'email' => 'root@domain.com',
            'enabled' => true,
            'password' => bcrypt('Password1'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => null,
        ]);
    }
}
