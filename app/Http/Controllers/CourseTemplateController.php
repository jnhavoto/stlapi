<?php

namespace App\Http\Controllers;

use App\Models\CoursesTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseTemplateController extends ModelController
{
    public function __construct() {
        $this->object = new CoursesTemplate();
        $this->objectName = 'course_template';
        $this->objectNames = 'course_template';
        $this->relactionships = [];
    }

    public function openCreteACourseTemplate()
    {
        return view('design.form_course_template', [
            'user' => Auth::user(),
            'userd' => Auth::user(),]);

    }

    public function openUpdateACourseTemplate($id)
    {
//        return CoursesTemplate::findOrFail($id);
        return view('design.update-course-template', [
            'user' => Auth::user(),
            'userd' => Auth::user(),
            'coursetemplate' => CoursesTemplate::findOrFail($id),
            ]);

    }


    public function createCourseTemplate(Request $request)
    {
//        return $request;
        DB::beginTransaction();
        //create group_teacher
        CoursesTemplate::create(
            [
                'name' => $request->name,
                'course_content' => $request->course_content,
            ]
        );
        DB::commit();
        return redirect('/admin_course_templates');
    }



}