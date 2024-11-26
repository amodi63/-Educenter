<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Teacher::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        DB::table('teachers')->insert([
            [
                'name' =>"Mohammed Safadi",
                'image' => 'teacher_john.png',
                'major' => 'Physics',
                'categorie_id' => 1,
            ],
            [
                'name' => 'Mohammed Ahmed',
                'image' => 'teacher_mary.png',
                'major' => 'Painting',
                'categorie_id' => 2,
            ],
        ]);
    }
}
