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
        factory(\App\Models\AssignmentNotifications::class, 3)->create();
        factory(\App\Models\Feedback::class, 3)->create();
        factory(\App\Models\AssignmentSubmission::class, 3)->create();
        factory(\App\Models\Student::class, 3)->create();

        //Student
        //Feedback
        //GroupAssignment
        //GroupStudents
        //SelfAssessment
        //StudentTeacherMessages
        //FeedbackMessages
    }
}
