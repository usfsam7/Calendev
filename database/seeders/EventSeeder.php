<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        \DB::table('events')->insert([
            [
                'title' => 'Math Exam',
                'description' => 'Final math exam for grade 10.',
                'start-date' => Carbon::parse('2025-08-01 09:00'),
                'end-date' => Carbon::parse('2025-08-01 11:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Science Fair',
                'description' => 'Annual science fair exhibition.',
                'start_date' => Carbon::parse('2025-08-10 10:00'),
                'end_date' => Carbon::parse('2025-08-10 15:00'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
