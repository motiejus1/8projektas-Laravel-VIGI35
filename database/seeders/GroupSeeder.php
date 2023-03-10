<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Student;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //atskirai sukuriam grupes
        // atskirai sukuriam studentus

        //kai kuriama grupe, tegu jei iskarto susikuria studentai
        //Student::factory()->count(50)->create();
        // Group::factory()->count(15)->create();

        // neveikia ????
        // Group::factory()->count(15)->groupStudents(1)->create();

        //Laravel 7

        //15


        // for ($i=0; $i < 15; $i++) {
        //     $group = Group::factory()
        //     ->has(Student::factory()->count(10))
        //     ->create();
        // }

            $student_number = rand(1,100);


            Group::factory()
            ->has(Student::factory()->count($student_number), 'groupStudents')
            ->count(15)
            ->create();

            // sukuria grupe -> iskart jei sukuria 10 studentu
            // sukuria grupe -> iskart jei sukuria 10 studentu
            // sukuria grupe -> iskart jei sukuria 10 studentu

        //  Group::factory()->count(15)->groupStudents()->create();   


        // Group::factory()->count(15)->create()->each(function($group) {
        // ;


        //     $group->groupStudents()->saveMany($students);     
        // });


    }
}
