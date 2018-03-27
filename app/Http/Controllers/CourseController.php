<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Method to get all course
     */
    public function getAllCourses()
    {

        $courses= Course::all();

        return response()->json(['courses'=>$courses],200);
    }

    /**
     * Method to get one specific course
     */
    public function getCourse($id)
    {
        $curso = Course::find($id);
        if($curso)
            return response()->json(['course' => $curso], 200);
        else
            return response()->json(['course' => $curso], 404);

    }


    /**
     * Method to store a course
     */
    public function store(Request $request)
    {
        $curso = Course::create([
            'name' =>  $request->name,
            'course_content' => $request->course_content,
            'departments_id' => $request->departments_id,
        ]);


        if($curso)
            return response()->json(['course' => $curso, 'mensagem' => 'Curso criado com sucesso'], 201);
        else
            return response()->json(['course' => $curso, 'mensagem' => 'Erro ao criar o curso'], 404);

    }



    /**
     * Method to update a course data
     */
    public function update(Request $request, $id)
    {
        return response()->json([$request->get('name')]);

        if(
            $curso = Course::find($id)->update([
            'name' =>  $request->name,
            'course_content' => $request->course_content,
            'departments_id' => $request->departments_id,
            ])
        )
            return response()->json(['course' => $curso, 'mensagem' => 'Curso actualizado com sucesso'], 203);
        else
            return response()->json(['course' => $curso, 'mensagem' => 'Erro ao actualizar o curso'], 404);

    }



    /**
     * Method to delete a course
     */
    public function destroy($id)
    {
        //
    }
}
