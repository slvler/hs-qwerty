<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => 'Admin'
        ]);
        Role::create([
            'title' => 'Technical'
        ]);
        Role::create([
            'title' => 'Editor'
        ]);
        Role::create([
            'title' => 'customer'
        ]);
    }
}
