<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
            'name' => 'Administrator',
        ]);

        $role = Role::firstOrCreate([
            'name' => 'User'
        ]);
    }
}
