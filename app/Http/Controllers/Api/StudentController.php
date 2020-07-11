<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grade;
use App\Section;
use App\Role;
use App\User;
use App\Student;
use App\Academicinfo;
use App\Parents;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::latest()->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getGrade()
    {
        $grade = Grade::get();
        return response()->json($grade);
    }
    public function getSection(Request $request)
    {
        $section=Section::where('grade_id', $request->grade_id)->get();
        return response()->json($section);
    }
    public function getRole()
    {
        $role = Role::get();
        return response()->json($role);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:191',
            'email'=>'required|string|email|max:191|unique:users',
            'password'=>'required|string|min:6',
            'gender'=>'required',
            'guardian_name'=>'required|string|max:191',
            'guardian_email'=>'required|string|email|max:191|',         
        ]);
        $role=Role::where('name',$request->role)->first();
        $user = new User([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => bcrypt($request->password),
        ]);
         $user->role()->associate($role);
        //  dd($user);
         $user->save();

         $grade=Grade::where('id',$request->grade)->first();
         $section=Section::where('id',$request->section)->first();

         $student = new Student([
             'name'=>$request->name,
             'email'=>$request->email,
             'gender'=>$request->gender,
             'guardian_name'=>$request->guardian_name,
             'guardian_email'=>$request->guardian_email,  
             'date_of_birth'=>$request->date_of_birth,
             'address'=>$request->address,
             'contact'=>$request->contact,
             'image'=>$request->image,
             'date_of_admission'=>$request->date_of_admission,
         ]);
        //  dd($student);
         $student->grade()->associate($grade);
        //  dd($student);
         $student->section()->associate($section);
        //  dd($student);
         $student->save();
        
         $student_info = array(
             'student_id'=>$student->id,
             'registration_number'=>$student->id,
             'academic_year'=>Carbon::now()->format('Y'),
             'grade_id'=>$student->grade_id,
             'section_id'=>$student->section_id,
             'roll_no'=>$request->roll_no,        
         );
         $student_result = Academicinfo::create($student_info);
        //  dd($student_result);
        
             $input_parents=array(
                'student_id'=>$student->id,
                'name'=>$student->guardian_name,
                'email'=>$student->guardian_email,
                'address'=>$request->guardian_address,
                'contact'=>$request->guardian_contact,
             );
             $add_parents=Parents::create($input_parents);
             dd($add_parents);
         return response()->json(['user'=>$user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
