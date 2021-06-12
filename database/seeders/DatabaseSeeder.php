<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TermSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\SubjectSeeder;
use Database\Seeders\TeacherSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            StudentSeeder::class,
            TermSeeder::class,
        ]);
    }
}
