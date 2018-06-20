<?php

namespace App\Http\Controllers;
use App\Employee;
use App\Students;
use App\Blogs;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //To view the records
	  public function index($id = null) {
        if ($id == null) {
            return Employee::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }
   
    //To save new records
    public function store(Request $request) {
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();
        return 'Employee record successfully created with id ' . $employee->id;
    }
    public function show($id) {
        return Employee::find($id);
    }
    //To update the records available in the database
    public function update(Request $request, $id) {
        $employee = Employee::find($id);
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->contact_number = $request->input('contact_number');
        $employee->position = $request->input('position');
        $employee->save();
        return "Sucess updating user #" . $employee->id;
    }
    //To delete certain data
    public function destroy(Request $request, $id) {
        $employee = Employee::find($id)->delete();
        return "Sucess deleting user #" . $employee->id;
    }
    //To get students data
    public function getData($id = null) {
        if ($id == null) {
            return Students::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }
    // To add students data
    public function addData(Request $request){
        $student = new Students;
        // $student->name = $request->input('name');
        // $student->email = $request->input('email');
        // $student->gender = $request->input('gender');
        // $student->interest = $request->input('interest');
        // $student->skills = $request->input('skills');
        $student->name = $request->input('data.name');
        $student->email = $request->input('data.email');
        $student->gender = $request->input('data.gender');
        $student->interest = $request->input('data.interest');
        $student->skills = $request->input('data.skills');
        $student->save();
        return Students::get();
    }
    //To edit student data 
    public function editData(Request $request, $id) {
        $student = Students::find($id);
        // $student->name = $request->input('name');
        // $student->email = $request->input('email');
        // $student->gender = $request->input('gender');
        // $student->interest = $request->input('interest');
        // $student->skills = $request->input('skills');
        $student->name = $request->input('data.name');
        $student->email = $request->input('data.email');
        $student->gender = $request->input('data.gender');
        $student->interest = $request->input('data.interest');
        $student->skills = $request->input('data.skills');
        $student->save();
        return Students::get();
    }
    //To delete student data
    public function deleteData(Request $request, $id) {
        $student = Students::find($id)->delete();
        return Students::get();
    }
    //To get Blog data
    public function getBlogs($id = null) {
        if ($id == null) {
            return Blogs::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }
    // To add Blog data
    public function addBlog(Request $request){
        $blog = new Blogs;
        $blog->author = $request->input('author');
        $blog->content = $request->input('content');
        $blog->image = $request->input('image');
        $blog->save();
        return Blogs::get();
    }
    //To edit blog data 
    public function editBlog(Request $request, $id) {
        $blog = Blogs::find($id);
        $blog->author = $request->input('author');
        $blog->content = $request->input('content');
        $blog->image = $request->input('image');
        $blog->save();
        return Blogs::get();
    }
    //To delete blog data
    public function deleteblog(Request $request, $id) {
        $blog = Blogs::find($id)->delete();
        return Blogs::get();
    }
}
