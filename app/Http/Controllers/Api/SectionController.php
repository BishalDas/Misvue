<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Grade;
use App\Section;

class SectionController extends Controller
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
    public function getGrade()
    {
        $grade = Grade::get();
        return response()->json($grade);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:191',
            'description'=>'required|string|max:191',
        ]);
         $grade=Grade::where('name',$request->grade)->first();
         $section = new Section([
            'name' => $request->name,
            'description'=> $request->description,
         ]);
         $section->grade()->associate($grade);
         $section->save();
         return response()->json(['section'=>$section]);
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
