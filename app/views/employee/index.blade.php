@extends('layouts.app')

@section('content')

    <h1>{{$titre}}</h1>
    <a class="btn btn-primary" href="{{route('main.home')}}" role="button">Home</a>

    <a class="btn btn-primary" href="{{route('employees.create')}}" role="button">Create employee</a>

    <table class="table">
        <tr class="row">
            <th class="col">LastName</th>
            <th class="col">FirstName</th>
            <th class="col">Title</th>
            <th class="col">Birthdate</th>
            <th class="col">Country</th>
            <th class="col">Action</th>
        </tr>
        @foreach ($employees as $employee)
            <tr class="row">
                <td class="col">{{$employee->LastName}}</td>
                <td class="col">{{$employee->FirstName}}</td>
                <td class="col">{{$employee->Title}}</td>
                <td class="col">{{$employee->BirthDate}}</td>
                <td class="col">{{$employee->Country}}</td>
                <td class="col flex flex-direction-horizontal">
                    <a class="btn btn-primary" href="{{route('employees.edit', $employee->EmployeeId)}}" role="button">
                        Edit
                    </a>
                    <form action="{{route('employees.destroy')}}" method="post" class="form-group">

                        <input type="hidden" name="EmployeeId" value="{{$employee->EmployeeId}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach

    </table>

    
@endsection