@extends('layouts.form')

@section('form')
    {{ $ingredient }}
    {!!Form::open(['action' =>
        [
            'IngredientsController@update',
            $restaurant_id,
            $recipe_id,
            $ingredient['id']
        ],'method' => 'POST', 'files' => true])!!}
        {{Form::bsText('ingredient', $ingredient['name'], ['placeholder' => 'ingredient'])}}
        {{Form::bsCheckbox('optional', 'Optional', 'optional', $ingredient['optional'])}}
        {{Form::bsCheckbox('selected_by_default', 'Selected By Default', 'selected_by_default', $ingredient['selected_by_default'])}}
        {{Form::bsSubmit('submit')}}
        {{ Form::hidden('_method', 'PUT') }}
    {{ Form::close() }}
@endsection
