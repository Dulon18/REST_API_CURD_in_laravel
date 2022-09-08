<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
            return response()->json([
            "success" => true,
            "message" => "Student List",
            "data" => $student
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'department' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
            }
        $student = Student::create($input);
        return response()->json([
        "success" => true,
        "message" => "Student created successfully.",
        "data" => $student
        ]);
      
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
        return $this->sendError('student not found.');
        }
        return response()->json([
        "success" => true,
        "message" => "Student data retrieved successfully.",
        "data" => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
        'name' => 'required',
        'department' => 'required',
        'email' => 'required',
        'phone' => 'required'
        ]);
        if($validator->fails()){
        return $this->sendError('Validation Error.', $validator->errors());       
        }
        $student->name = $input['name'];
        $student->department = $input['department'];
        $student->email = $input['email'];
        $student->phone = $input['phone'];
        $student->save();
        return response()->json([
        "success" => true,
        "message" => "Student info updated successfully.",
        "data" => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Student $student)
    {
        $student->delete();
        return response()->json([
        "success" => true,
        "message" => "Product deleted successfully.",
        "data" => $student
]);
    }
}
