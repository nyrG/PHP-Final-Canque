<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function getStudents(){
       try{
        return Student::all();

    }catch(\Exception $e){
        return response()->json(["message" => $e->getMessage()], 200);
    }
    }
    public function getStudbyID($id){
        try{
            $student = Student::findorFail($id);
            return response()->json($student,200);
    
        }
        catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()], 200);
        }
    }
    public function addStud(Request $request){
        try{
            $student = new Student;
            $student->name = $request->name;
            $student->grade = $request->grade;

            $student->save();
            return response()->json(["message"=>"Successfully Added"], 200);

        }catch(\Exception $e){
            return response()->json(["message"=>$e->getMessage()], 200);
        }
    }
    
    public function updateStud(Request $request, $id){
        try{

            $student = Student::findOrFail($id);

            $student->name = $request->name;
            $student->grade = $request->grade;

            $student->save();

            return response()->json(["message" => "Successfully Updated"], 200);
        }catch(\Exception $e){
            return response()->json(["message" => $e->getMessage()], 200);
        }
    }
    
    public function deleteStud($id){
            try{
                $student = Student::findOrFail($id);

                $student->delete();
                return response()->json(["message"=>"Deleted Student"], 200);

            }catch(\Exception $e){
                return response()->json(["message" => $e->getMessage()], 200);

    }
}
}