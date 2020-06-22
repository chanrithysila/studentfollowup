<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $students = Student::all();
        return view('home',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = Student::all();
        return view('home',compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student;
        $students->firstname = $request->get('firstname');
        $students->lastname = $request->get('lastname');
        $students->class = $request->get('class');
        $students->picture = $request->get('picture');
        $students->description = $request->get('description');
        $students->save();
        // dd($students->firstname);
        // die();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::find($id);
        return view('students.show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $students = Student::find($id);
        // return view('students', compact('students'));
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
        // $students = Student::find($id);

        // $students->firstname = $request->get('firstname');
        // $students->lastname = $request->get('lastname');
        // $students->class = $request->get('class');
        // $students->description = $request->get('description');
        // $students->picture = $request->get('picture');
        // $students -> save();
        // return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $students = Student::find($id);
        // $students -> delete();
        // return redirect('home');
    }
}
