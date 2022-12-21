<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

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
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groups = Group::all();
        return view('students.create', ['groups' => $groups]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student;
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
        $student->phone = $request->student_phone;
        $student->group_id = $request->student_groupid;

        $student->save();

        return redirect()->route('students.index')->with('success_message', 'Studentas buvo sukurta sekmingai.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groups = Group::all();
        return view('students.edit',['student'=>$student, 'groups'=>$groups]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
    
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
        $student->phone = $request->student_phone;
        $student->group_id = $request->student_groupid;

        $student->save();

        return redirect()->route('students.index')->with('success_message', 'Studentas buvo atnaujintas sekmingai.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success_message', 'Studentas buvo istrintas sekmingai.');
    }

    public function storeGroupView(StoreStudentRequest $request)
    {
        $student = new Student;
        $student->name = $request->student_name;
        $student->surname = $request->student_surname;
        $student->email = $request->student_email;
        $student->phone = $request->student_phone;
        $student->group_id = $request->student_groupid;

        $student->save();

        return redirect()->route('groups.show', [$request->student_groupid]);
    }
}
