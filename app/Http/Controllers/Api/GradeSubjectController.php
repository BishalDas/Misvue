<?php

namespace App\Http\Controllers\Api;
// use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grade;
use App\Gradesubject;
// use Request;


class GradeSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
       // input = $request->all();
       //  // $test=$request->subjectname;
       //  // $input=[]
       //  // dd($x);
       //  // dd($x);
       //  // dd($input);

       //  for ($i=0; $i < count($request->subjectname); ++$i) 
       //  {
       //      $gradesubject= new Gradesubject;
       //      $gradesubject->subjectname = $request->subjectname[$i];
       //      $gradesubject->fullmarks= $request->fullmarks[$i];
       //      $gradesubject->theorymarks= $request->theorymarks[$i];
       //      $gradesubject->practicalmarks= $request->practicalmarks[$i];
       //      dd($gradesubject);
       //      $gradesubject->save();
       //  } $


        // $subjectname=$request->subjectname;
        // $data=array();
        // foreach($subjectname as $subject){
        //     dd($subjectname);
        //     if(!empty($subject)){
        //         $data[]=[
        //             'subjectname'=>$subject
        //         ];
        //     }
        // } 
        // Gradesubject::insert($data);      
        // foreach($request->get('subjectname') as $subjectname) {
        //     $subjectdata =  new Gradesubject;
        //     $subjectdata->subjectname = $subjectname;
        //     dd($subjectdata);
        //     $subjectdata->save();
        // }
        // return "Success";  
        $data= $request->all();
        // dd($data);
        // $data= $request->only(['subjectname']);
        // dd($data);
        // $grade=Grade::where('name',$request->grade)->first();
        foreach($data['subjectname'] as $key => $value){
            if(!empty($value)){
                                
                 $subject_data = new Gradesubject;
                 $subject_data->subjectname=$value;
                 // dd($subjectdata);
                 $subject_data->fullmarks=$data['fullmarks'][$key];
                 $subject_data->theorymarks=$data['theorymarks'][$key];
                 $subject_data->practicalmarks=$data['practicalmarks'][$key];
                 dd($subject_data);    
                 //  $subject_data->save();
            }
            // $subject_data->grade()->associate($grade);
        }
        // $count=0;
        // $gradesubject = $request->input('subjectname');
        // for($i=0;$i<($count[$gradesubject]);$i++){
        //     $subject = new Gradesubject([
        //     'subjectname' => $subjectname[$i],
        //     ]);
        //     // dd($subject);
        //     $subject->save();
        // }
        // $rules = [];

        // foreach($request->input('subjectname') as $key => $value) {
        //     $rules["subjectname.{$key}"] = 'required';
        // }

        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->passes()) {

        //     foreach($request->input('subjectname') as $key => $value) {
        //         Gradesubject::create(['subjectname'=>$value]);
        //     }

        //     return response()->json(['success'=>'done']);
        // }

        // return response()->json(['error'=>$validator->errors()->all()]);
    }
    // public function addMorePost(Request $request)
    // {   
    //     $input = $request->all();
    //     // $input=[];
    //     // $x=count($request->fullmarks);
    //     // dd($x);
    //     // dd($input);
    //     for ($i=0; $i < count($request->subjectname); ++$i) 
    //     {
    //         $gradesubject= new Gradesubject;
    //         $gradesubject->subjectname = $input['subjectname'][$i];
    //         $gradesubject->fullmarks= $input['fullmarks'][$i];
    //         $gradesubject->theorymarks= $input['theorymarks'][$i];
    //         $gradesubject->practicalmarks= $input['practicalmarks'][$i];
    //         // dd($gradesubject);
    //         $gradesubject->save();
    //     }
    //     // $request->validate([
    //     //     'addmore.*.subjectname' => 'required',
    //     //     'addmore.*.fullmarks' => 'required',
    //     //     'addmore.*.theorymarks' => 'required',
    //     //     'addmore.*.practicalmarks' => 'required',
    //     // ]);
    //     // // dd($request);
    
    //     // foreach($request['addmore'] as $key => $value)
    //     // {
    //     //     Gradesubject::create($value);
    //     // }
    
    //     // return back()->with('success', 'Record Created Successfully.');
    // }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getGrade()
    {
        $grade = Grade::get();
        return response()->json($grade);
    }
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
