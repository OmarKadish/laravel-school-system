<?php

namespace Modules\Subject\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subject\Entities\Subject;
use Modules\Subject\Http\Requests\AddEditSubjectRequest;

class SubjectApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function getAll()
    {
        return response([
            'data' => Subject::all(),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AddEditSubjectRequest $request)
    {
        Subject::create($request->all());
        return response([
            'message' => 'Added Successfully'
        ], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $subject = Subject::find($id);
        if (!$subject) {
            return response([
                'message' => 'Subject not found',
            ], 404);
        } else {
            return response([
                'data' => $subject
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function update(AddEditSubjectRequest $request)
    {
        $subject = Subject::find($request->id);
        if (!$subject) {
            return response([
               'message' => 'Subject not found',
            ], 404);
        } else {
            $subject->update($request->all());
            return response([
                'message' => 'Updated Successfully',
                'data' => $subject
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        Subject::find($id)->delete();
        return response([
          'message' => 'Deleted Successfully'
        ], 201);
    }
}
