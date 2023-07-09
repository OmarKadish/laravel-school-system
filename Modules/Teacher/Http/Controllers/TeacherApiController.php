<?php

namespace Modules\Teacher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Teacher\Entities\Teacher;
use Modules\Teacher\Http\Requests\AddTeacherRequest;
use Modules\Teacher\Http\Requests\EditTeacherRequest;

class TeacherApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getAll()
    {
        return response(Teacher::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Foundation\Application|\Illuminate\Http\Response
     */
    public function store(AddTeacherRequest $request)
    {
        $teacher = Teacher::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'subject_id' => $request->get('subject_id'),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),
            'birth_date' => $request->get('birth_date'),
        ]);

        return response([
            'message' => 'Added successfully.',
            'data' => $teacher,
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return response([
                'data' => $teacher,
            ], 200);
        }
        return response([
          'message' => 'Not found.',
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(EditTeacherRequest $request)
    {
        $teacher = Teacher::find($request->id);
        if ($teacher){
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->email = $request->email;
            $teacher->subject_id = $request->subject_id;
            $teacher->phone_number = $request->phone_number;
            $teacher->birth_date = $request->birth_date;
            $teacher->address = $request->address;
            $teacher->save();

            return response([
                'message' => 'Updated successfully.',
                'data' => $teacher,
            ], 200);
        }

        return response([
            'message' => 'Update failed. Please try again',
        ], 400);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        if(Teacher::destroy($id)){
            return response([
              'message' => 'Deleted successfully.',
            ], 200);
        } else{
            return response([
             'message' => 'Delete failed. Please try again',
            ], 400);
        }
    }
}
