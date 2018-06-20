<?php

namespace App\Http\Controllers;
use App\Employee;
use Illuminate\Http\Request;

class Employees extends Controller
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
        return "Employee record successfully deleted #" . $request->input('id');
    }
}
