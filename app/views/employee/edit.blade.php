@extends('layouts.app')

@section('content')
    <h1>Edit employee</h1>
    <form action="{{route('employees.update')}}" method="post" class="form-group">
        <input type="hidden" name="EmployeeId" value="{{$employee->EmployeeId}}"> 
        @include('employee._form')
        <button class="btn btn-dark" type="submit">Update</button>
    </form>
@endsection