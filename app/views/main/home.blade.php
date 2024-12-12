@extends('layouts/app')

@section('content')

<p>Welcome home!</p>

<a href="{{app()->route('main.about')}}">about</a>

<a href="/customers">customers</a>
<a href="/employees">employees</a>

    
@endsection