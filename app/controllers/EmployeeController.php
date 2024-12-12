<?php

namespace App\Controllers;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $titre = 'Employees';
        $employees = Employee::select('FirstName', 'LastName', 'Title', 'BirthDate', 'Country', 'EmployeeId')->orderBy('EmployeeID', 'DESC')->get();
        render('employee.index', ['titre'=>$titre, 'employees'=>$employees]);
    }

    public function create(){
        $employee = new Employee();
        render('employee.create', ['employee'=>$employee]);
    }

    public function store(){
        $data = request()->postData();
        $employee = new Employee();
        $employee->FirstName = $data['FirstName'];
        $employee->LastName = $data['LastName'];
        $employee->Title = $data['Title'];
        $employee->BirthDate = $data['BirthDate'];
        $employee->Country = $data['Country'];
        $employee->save();
        response()->redirect(route('employees.index'));
    }
    public function edit(int $EmployeeId){
        $employee = Employee::find($EmployeeId);
        render('employee.edit', ['employee'=>$employee]);
    }
    public function update(){
        $data = request()->postData();
        $employee = Employee::find($data['EmployeeId']);
        $employee->FirstName = $data['FirstName'];
        $employee->LastName = $data['LastName'];
        $employee->Title = $data['Title'];
        $employee->BirthDate = $data['BirthDate'];
        $employee->Country = $data['Country'];
        $employee->save();
        response()->redirect(route('employees.index'));
    }

    public function destroy(){
        $data = request()->postData();
        $employee = Employee::find($data['EmployeeId']);
        $employee->delete();
        response()->redirect(route('employees.index'));
    }
}
