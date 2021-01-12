<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentInfo;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentInfo::create([
			"name"         => "ahad",
			"email"        => "ahad@gmail.com",
			"password"     => bcrypt('12345'),
			"roll"         => "12345678",
			"session"      => "17-21",
			"phone_number" => "01845392010"
        ]);
    }
}
