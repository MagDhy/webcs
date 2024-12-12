@extends('layouts.app')

@section('content')
<h1>Edit customer</h1>
    <form action="{{route('customers.update')}}" method="post" class="form-group">
    <input type="hidden" name="CustomerId" value="{{$customer->CustomerId}}"> 
    <!-- passer customerId dans le form pour le lier avec le customer en bdd -->

<!-- Ajouter le csrf dans tous les formulaires (aussi login/register) sinon ils ne passeront pas, 
    a pour but de s'assurer que le formulaire  et les données viennent de mon app -->
        @include('customer._form')
        <button class="btn btn-dark" type="submit">Update</button>
    </form>
@endsection