@extends('layouts.app')

@section('content')
<h1>Create new employee</h1>
    <form action="{{route('employees.store')}}" method="post" class="form-group">
        
        @include('employee._form')
        <button class="btn btn-dark" type="submit">Create</button>
    </form>
    
@endsection