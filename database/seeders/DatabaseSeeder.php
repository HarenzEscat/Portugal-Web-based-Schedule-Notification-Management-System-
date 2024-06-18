<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
        ]);

        Schedule::truncate();
        Schedule::create([
             'schedulename' => 'task',
             'description' => 'asdadsadad',
             'date' => '2020-01-01',
             'time' => '11:11',
         ]);
        Schedule::create([
            'schedulename' => 'task',
            'description' => 'asdadsadad',
            'date' => '2020-01-01',
            'time' => '11:11',
        ]);
        Schedule::create([
            'schedulename' => 'task',
            'description' => 'asdadsadad',
            'date' => '2020-01-01',
            'time' => '11:11',
        ]);
        Schedule::create([
            'schedulename' => 'task',
            'description' => 'asdadsadad',
            'date' => '2020-01-01',
            'time' => '11:11',
        ]);
        Schedule::create([
            'schedulename' => 'task',
            'description' => 'asdadsadad',
            'date' => '2020-01-01',
            'time' => '11:11',
        ]);
        Schedule::create([
            'schedulename' => 'task',
            'description' => 'asdadsadad',
            'date' => '2020-01-01',
            'time' => '11:11',
        ]);
    }
}
