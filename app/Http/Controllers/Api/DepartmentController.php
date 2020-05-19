<?php

namespace App\Http\Controllers\Api;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();

        return $departments;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department = Department::create([
            "number" => $request->number,
            "name" => $request->name,
            "shift_1_start" => $request->shift_1_start,
            "break_1_start" => $request->break_1_start,
            "break_1_end" => $request->break_1_end,
            "shift_1_end" => $request->shift_1_end,
            "shift_2_start" => $request->shift_2_start,
            "break_2_start" => $request->break_2_start,
            "break_2_end" => $request->break_2_end,
            "shift_2_end" => $request->shift_2_end,
           
        ]);

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update([
            "number" => $request->number ?? $request->number ?? $department->number,
            "name" => $request->name ?? $request->name ?? $department->name,
            "shift_1_start" => $request->shift_1_start ?? $request->shift_1_start ?? $department->shift_1_start,
            "break_1_start" => $request->break_1_start ?? $request->break_1_start ?? $department->break_1_start,
            "break_1_end" => $request->break_1_end ?? $request->break_1_end ?? $department->break_1_end,
            "shift_1_end" => $request->shift_1_end ?? $request->shift_1_end ?? $department->shift_1_end,
            "shift_2_start" => $request->shift_2_start ?? $request->shift_2_start ?? $department->shift_2_start,
            "break_2_start" => $request->break_2_start ?? $request->break_2_start ?? $department->break_2_start,
            "break_2_end" => $request->break_2_end ?? $request->break_2_end ?? $department->break_2_end,
            "shift_2_end" => $request->shift_2_end ?? $request->shift_2_end ?? $department->shift_2_end,
        ]);

        return response()->json(['success' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return response()->json(['success' => 'success'], 200);
    }
}
