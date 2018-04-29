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
        factory(\App\User::class, 10)->create();
        factory(\App\Models\Student::class, 3)->create();
        factory(\App\Models\Teacher::class, 3)->create();
        factory(\App\Models\TeacherCourse::class, 5)->create();
        factory(\App\Models\AssignmentDescription::class, 3)->create();
        factory(\App\Models\Group::class, 3)->create();
        factory(\App\Models\GroupsAssignmentDescription::class, 3)->create();
        factory(\App\Models\Level::class, 3)->create();
        factory(\App\Models\Question::class, 3)->create();
        factory(\App\Models\SelfAssessment::class, 3)->create();
        factory(\App\Models\QuestionsSelfAssessment::class, 3)->create();

        factory(\App\Models\AssignmentAnnouncement::class, 3)->create();



        factory(\App\Models\AssignmentSubmission::class, 3)->create();
        factory(\App\Models\Feedback::class, 3)->create();

        //Student
        //Feedback
        //GroupAssignment
        //GroupStudents
        //SelfAssessment
        //StudentTeacherMessages
        //FeedbackMessages
    }
}
