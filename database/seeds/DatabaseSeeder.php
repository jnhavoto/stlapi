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
        factory(\App\Models\Course::class, 5)->create();
        factory(\App\Models\City::class, 10)->create();
        factory(\App\Models\School::class, 10)->create();
        factory(\App\User::class, 30)->create();
        factory(\App\Models\Teacher::class, 5)->create();
        factory(\App\Models\Student::class, 5)->create();
        factory(\App\Models\TeacherCourse::class, 5)->create();
        factory(\App\Models\GroupTeacher::class, 3)->create();
        factory(\App\Models\AssignmentDescription::class, 3)->create();
        factory(\App\Models\AssignmentDescriptionsHasTeacher::class, 3)->create();
        factory(\App\Models\Group::class, 3)->create();
        factory(\App\Models\StudentMember::class, 3)->create();
        factory(\App\Models\GroupsAssignmentDescription::class, 3)->create();
        factory(\App\Models\Level::class, 6)->create();
        factory(\App\Models\Question::class, 3)->create();
        factory(\App\Models\StudentsCourse::class, 3)->create();
        factory(\App\Models\SelfAssessment::class, 3)->create();
        factory(\App\Models\QuestionsSelfAssessment::class, 3)->create();
        factory(\App\Models\TeacherMember::class, 3)->create();
        factory(\App\Models\AssignmentAnnouncement::class, 3)->create();
        factory(\App\Models\AssignmentSubmission::class, 3)->create();
        factory(\App\Models\Feedback::class, 3)->create();
        factory(\App\Models\RatingFeedback::class, 3)->create();
        factory(\App\Models\MediaType::class, 3)->create();
        factory(\App\Models\GroupMessage::class, 3)->create();
        factory(\App\Models\FeedbackType::class, 3)->create();
        factory(\App\Models\FeedbackTypeAssignmentSubmission::class, 3)->create();
        factory(\App\Models\FeedbackMessage::class, 3)->create();
        factory(\App\Models\DigitalTool::class, 3)->create();
        factory(\App\Models\DigitalToolsHasStudent::class, 3)->create();
        factory(\App\Models\AssignmentSubmissionsMediaType::class, 3)->create();
        factory(\App\Models\StudentNotificationStatus::class, 3)->create();
        factory(\App\Models\Subject::class, 3)->create();
        factory(\App\Models\SubjectsHasStudent::class, 3)->create();
        factory(\App\Models\TechUse::class, 3)->create();
        factory(\App\Models\TechUseHasStudent::class, 3)->create();
        factory(\App\Models\WorkMethod::class, 3)->create();
        factory(\App\Models\WorkMethodsHasStudent::class, 3)->create();
        factory(\App\Models\WorkplaceTool::class, 3)->create();
        factory(\App\Models\WorkplaceToolsHasStudent::class, 3)->create();
    }
}
