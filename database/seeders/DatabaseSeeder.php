<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\Jobs;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();
        $users = User::all()->shuffle();

        for ($i = 0; $i <= 19; $i++) {
            Employer::factory()->create([
                'user_id' => $users->pop()->id,
            ]
            );

        }
        $employers = Employer::all();

        //    Jobs::factory(100)->create();
        for ($i = 0; $i <= 100; $i++) {
            Jobs::factory()->create(
                [
                    'employer_id' => $employers->random()->id,
                ]
            );
        }
        foreach ($users as $user) {
            $jobs = Jobs::inRandomOrder()->take(10)->get();
            foreach ($jobs as $job) {
                JobApplication::factory()->create(
                    [
                        'user_id' => $user->id,
                        'jobs_id' => $job->id,
                    ]
                );
            }

        }
    }
}
