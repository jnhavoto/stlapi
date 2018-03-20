<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(\App\Models\Department::class, 2)->create();
        factory(\App\Models\Course::class, 3)->create();
        factory(\App\Models\City::class, 10)->create();
        factory(\App\Models\School::class, 10)->create();
        factory(\App\Models\User::class, 10)->create();
        factory(\App\Models\Teacher::class, 5)->create();
        factory(\App\Models\TeacherCourse::class, 5)->create();
        factory(\App\Models\AssignmentDescription::class, 3)->create();
        //Add
        //Student
        //AssignmentNotifications
        //Feedback
        //GroupAssignment
        //GroupStudents
        //SelfAssessmentAssignment
        //StudentTeacherMessages
        //FeedbackMessages
    }
}
