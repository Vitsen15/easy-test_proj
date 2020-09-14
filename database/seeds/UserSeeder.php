<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 6)->create();

        $testUser = factory(User::class)->create(['name' => 'testNonAdminUser', 'email' => 'regularuser@mail.com', 'password' => bcrypt('Temp123#')]);
        $testUser->assignRole('user');

        $testAdminUser = factory(User::class)->create(['name' => 'testAdminUser', 'email' => 'adminuser@mail.com', 'password' => bcrypt('Temp1234#')]);
        $testAdminUser->assignRole('admin');
    }
}
