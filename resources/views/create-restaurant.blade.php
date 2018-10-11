@extends('layouts.form')

@section('form')
    {!!Form::open(['action' => 'RestaurantsController@store','method' => 'POST'])!!}
        {{Form::bsText('restaurant name','',['placeholder' => 'Name'])}}
        {{Form::bsSubmit('submit')}}
    {{ Form::close() }}
@endsection
