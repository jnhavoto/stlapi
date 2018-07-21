<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 21 Jul 2018 12:59:27 +0000.
 */

namespace App\Models;

use Carbon\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 * 
 * @property int $id
 * @property \Carbon\Carbon $startdate
 * @property int $status
 * @property int $departments_id
 * @property int $courses_template_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Department $department
 * @property \App\Models\CoursesTemplate $courses_template
 * @property \Illuminate\Database\Eloquent\Collection $assignment_descriptions
 * @property \Illuminate\Database\Eloquent\Collection $course_materials
 * @property \Illuminate\Database\Eloquent\Collection $students
 * @property \Illuminate\Database\Eloquent\Collection $teachers
 *
 * @package App\Models
 */
class Course extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'status' => 'int',
		'departments_id' => 'int',
		'courses_template_id' => 'int'
	];

	protected $dates = [
		'startdate'
	];

    protected $dates = [
        'created_at',
    ];

	protected $fillable = [
		'startdate',
		'status',
		'departments_id',
		'courses_template_id'
	];

	public function department()
	{
		return $this->belongsTo(\App\Models\Department::class, 'departments_id');
	}

	public function courses_template()
	{
		return $this->belongsTo(\App\Models\CoursesTemplate::class);
	}

	public function assignment_descriptions()
	{
		return $this->belongsToMany(\App\Models\AssignmentDescription::class, 'assignment_descriptions_has_courses', 'courses_id', 'assignment_descriptions_id');
	}

	public function course_materials()
	{
		return $this->hasMany(\App\Models\CourseMaterial::class, 'courses_id');
	}

	public function students()
	{
		return $this->belongsToMany(\App\Models\Student::class, 'students_courses', 'courses_id', 'students_id')
					->withPivot('id', 'start_date', 'end_date', 'status', 'deleted_at')
					->withTimestamps();
	}

	public function teachers()
	{
		return $this->belongsToMany(\App\Models\Teacher::class, 'teacher_courses', 'courses_id', 'teachers_id')
					->withPivot('id', 'deleted_at')
					->withTimestamps();
	}

    public function getCreatedAtAttribute($created_at){
        $carbonated_date = Carbon::parse($created_at)->format('Y-m-d');
        return $carbonated_date;
    }
}
