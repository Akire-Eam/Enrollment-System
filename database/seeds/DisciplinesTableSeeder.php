<?php

use App\Discipline;
use Illuminate\Database\Seeder;

class DisciplinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplines = ['Computer Science', 'General Electives', 'Physical Education', 'Biochemistry', 'Applied Physics', 'Biology', 
        'Social Science', 'Political Science', 'Philippine Arts', 'Organizational Communication', 'Development Studies', 'Bheavioral Science'];

        foreach($disciplines as $discipline)
            Discipline::create(['name' => $discipline]);
    }
}
