<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
class StudentController extends Controller
{
   
    public function index()
    {
        $student = Student::all();
            return response()->json([
            "success" => true,
            "message" => "Student List",
            "data" => $student
            ]);
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
    
    public function show($id)
    {
        $student = Student::find($id);
        if (is_null($student)) {
        return $this->sendError('student not found.');
        }
        else{
            return response()->json([
                "success" => true,
                "message" => "Student data retrieved successfully.",
                "data" => $student
                ]);
        }
      
    }

    public function updateData(Request $request,Student $student)
    {
        
        $input = $request->all();
        $student->name = $input['name'];
        $student->department = $input['department'];
        $student->email = $input['email'];
        $student->phone = $input['phone'];
        $student->save();
        return response()->json([
        "success" => true,
        "message" => "student updated successfully.",
        "data" => $student
        ]);
        
    }


  
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return response()->json([
        "success" => true,
        "message" => "Student deleted successfully.",
        "data" => $student
]);
    }
}
