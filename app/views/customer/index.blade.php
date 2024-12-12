@extends('layouts.app')

@section('content')
 
    <h1>{{$titre}}</h1>
    <a class="btn btn-primary" href="{{app()->route('main.home')}}" role="button">Home</a>
    
    <a class="btn btn-primary" href="/customers/create" role="button">Create customer</a>

    <table class="table">
        <tr class="row">
            <th class="col">FirstName</th>
            <th class="col">LastName</th>
            <th class="col">City</th>
            <th class="col">Action</th>
        </tr>
        @foreach ($customers as $customer)
            <tr class="row">
                <td class="col">{{ $customer->FirstName }}</td>
                <td class="col">{{ $customer->LastName }}</td>
                <td class="col">{{ $customer->City }}</td>
                <td class="col flex flex-direction-horizontal">
                    <a class="btn btn-primary" href="{{route('customers.edit', $customer->CustomerId)}}" role="button">
                        Edit
                    </a>
                    <!-- possible utiliser same manner as delete ? -->
                    <form action="{{route('customers.destroy')}}" method="post" class="form-group">
                        
                        <input type="hidden" name="CustomerId" value="{{$customer->CustomerId}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            
        @endforeach
        
    </table>
    
@endsection