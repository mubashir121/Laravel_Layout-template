<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
      
        return view('student-details.add-student-form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $add_student_data = new Student();
      $add_student_data->name = $request->name;
      $add_student_data->subject = implode(',', $request->subject);
      $add_student_data->roll_no = $request->roll_no;
      $add_student_data->class = $request->class;
      $add_student_data->gender = $request->gender;
      $add_student_data->save();
      if ($add_student_data) {
            
        return redirect(url('/students-table'))->with('success','Your Data successfully Saved');        
    }else {
        return back()->with('error','You have Something Error');
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      $student_table = Student::all();
      return view('student-details.student-table',compact('student_table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student_form_update = Student::find($id);
      return view('student-details.edit-student-form',[
        'student_update' =>  $student_form_update,
        'subject' => explode(',', $student_form_update->subject),
        'class' => explode(',', $student_form_update->class)
      ]);
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
      $student_form_update = Student::find($id);
      $student_form_update->name = $request->name;
      $student_form_update->subject = implode(',', $request->subject);
      $student_form_update->roll_no = $request->roll_no;
      $student_form_update->class = $request->class;
      $student_form_update->gender = $request->gender;
      $student_form_update->save();
      if ($student_form_update) {
            
        return redirect(url('/students-table'))->with('success','Your Data successfully Updated');        
    }else {
        return back()->with('error','You have Something Error');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_data = Student::find($id);
        $student_data->destroy($id); 
        return back()->with('message','Your data is Deleted');
    }
}
