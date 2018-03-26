<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssignmentSubmission extends Model
{
    protected $primaryKey='id';

    protected $table = 'assignment_submissions';

    protected $fillable = [
        'students_id', 'courses_id', 'teachers_id', 'group_assignments_id', 'assignment_descriptions_id',
        'area', 'grade', 'number_of_students', 'start_date_of_lecture', 'end_date_of_lecture', 'purpose',
        'curriculum_requirement', 'preview_text', 'preview_check', 'inspiration', 'text_types', 'task_formulation',
        'media_type', 'feedback_check', 'assessment', 'analysis_text', 'good_experience', 'bad_experience',
        'learned_consequence', 'next_goal', 'submission_date'
    ];


    public function course(){
        return $this->belongsTo('App\Models\Course', 'courses_id');
    }

    public function teacher(){
        return $this->belongsTo('App\Models\Teacher', 'teachers_id');
    }

    public function group_assignment(){
        return $this->belongsTo('App\Models\GroupAssignment', 'group_assignments_id');
    }

    public function feedbacks(){
        return $this->hasMany('App\Models\Feedback', 'assignment_submissions_id');
    }


}
