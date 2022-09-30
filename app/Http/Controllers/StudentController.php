<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $data = student::get();
        // return $data;
        return view('student-list', compact('data'));
    }
    public function addStudent()
    {
        return view('add-student');
    }
    public function saveStudent(Request $request)
    {
        // dd($request->all()); to show all data revied form form

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'address' => 'required',
        ]);

        $name = $request->name;
        $email = $request->email;
        $number = $request->number;
        $address = $request->address;

        $stu = new Student();
        $stu->name = $name;
        $stu->email = $email;
        $stu->phone = $number;
        $stu->address = $address;
        $stu->save();

        return redirect()->back()->with('success', 'New Record Added Successfully');
    }
    public function editStudent($id)
    {
        $data = Student::where('id', '=', $id)->first();
        return view('edit-student', compact('data'));
        // return $data;
    }

    public function updateStudent(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'address' => 'required',
        ]);

        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $number = $request->number;
        $address = $request->address;

        Student::where('id', '=', $id)->update([
            'name' => $name,
            'email' => $email,
            'phone' => $number,
            'address' => $address,
        ]);

        return redirect()->back()->with('success', 'Record updated Successfully');
    }

    public function deleteStudent($id)
    {
        Student::where('id', '=', $id)->delete();

        return redirect()->back()->with('success', 'Record Deleted Successfully');
    }
}
