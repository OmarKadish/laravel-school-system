<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Student\Entities\Student;
use Modules\Student\Http\Requests\AddStudentRequest;
use Modules\Student\Http\Requests\EditStudentRequest;
use Modules\Subject\Http\Requests\AddEditSubjectRequest;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getAll()
    {
        return response(Student::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AddStudentRequest $request)
    {
        $student = Student::create($request->all());
        return response([
            'message' => 'Student Added Successfully',
            'data' => $student,
        ], 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $student = Student::with('subjects')->find($id);
        if($student){
            return response([
                'data' => $student
            ], 200);
        } else {
            return response([
                'message' => 'Student not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EditStudentRequest $request)
    {
        Student::find($request->id)->update($request->all());
        return response([
            'message' => 'Student updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(Student::destroy($id)){
            return response([
                'message' => 'Deleted successfully',
            ], 200);
        } else {
            return response([
                'message' => 'Delete failed, please try again',
            ], 400);
        }

    }

    public function assignSubjects(Request $request)
    {
        $data = $request->validate([
            'std_id' => 'required|exists:students,id',
            'sub_ids' => 'required|array',
            'sub_ids.*' => 'exists:subjects,id',
        ]);
        $student = Student::with('subjects')->find($request->std_id);
        $student->subjects()->attach($request->sub_ids);
        return response([
            'message' => 'Added successfully.'
        ], 200);
    }
}
