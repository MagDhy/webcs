@extends('layouts.app')

@section('content')
    <p>
        Hello in about
    </p>
    <a href="{{app()->route('main.home')}}">Home</a>
@endsection

@section('scripts')
    <script src="{{ assets('js/app.js')}}"></script>
@endsection