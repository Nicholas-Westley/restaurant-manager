@extends('layouts.form')

@section('form')
    {!!Form::open(['action' =>
        [
            'IngredientsController@store',
            $restaurant_id,
            $recipe_id
        ],'method' => 'POST', 'files' => true])!!}
        {{Form::bsText('ingredient','',['placeholder' => 'ingredient'])}}
        {{Form::bsCheckbox('optional', 'Optional', 'optional')}}
        {{Form::bsCheckbox('selected_by_default', 'Selected By Default', 'selected_by_default')}}
        {{Form::bsSubmit('submit')}}
    {{ Form::close() }}
@endsection
