@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="restaurants/create">
        Create New
    </a>
    @foreach($restaurants as $restaurant)
        <h2> {{ $restaurant['name'] }} </h2>
    @endforeach
@endsection


