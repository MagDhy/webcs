@extends('layouts/app')

@section('content')
<h1>Create new customer</h1>
    <form action="{{route('customers.store')}}" method="post" class="form-group">

<!-- Ajouter le csrf dans tous les formulaires (aussi login/register) sinon ils ne passeront pas sauf 
    si mis en global dans config/csrf.php -->
    a pour but de s'assurer que le formulaire  et les données viennent de mon app -->
        @include('customer._form')
        <button class="btn btn-dark" type="submit">Create</button>
    </form>
@endsection