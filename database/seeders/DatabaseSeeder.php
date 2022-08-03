<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Tugas::factory(5)->create();
        // \App\Models\TugasUser::factory(100)->create();
        // \App\Models\Submission::factory(100)->create();
        \App\Models\Group::factory(5)->create();
        \App\Models\GroupUser::factory(50)->create();
        \App\Models\EventDay::factory(4)->create();
        \App\Models\Event::factory(20)->create();
        \App\Models\SesiAbsensi::factory(3)->create();

        $tugases = \App\Models\Tugas::all();
        foreach ($tugases as $key => $tugas) {
            $tugas->users()->syncWithPivotValues(\App\Models\User::pluck('id'), ['status' => 0]);
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
