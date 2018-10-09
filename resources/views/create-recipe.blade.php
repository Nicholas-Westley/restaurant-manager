@extends('layouts.form')

@section('form')
    {!!Form::open(['action' => ['RecipesController@store', $restaurant_id],'method' => 'POST', 'files' => true])!!}
        {{Form::bsText('recipe name','',['placeholder' => 'Name'])}}
        {{Form::bsText('recipe description','',['placeholder' => 'Description'])}}
        {{Form::bsInput('recipe image')}}
        {{Form::bsSubmit('submit')}}
    {{ Form::close() }}
@endsection
