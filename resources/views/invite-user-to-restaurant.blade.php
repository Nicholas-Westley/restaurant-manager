@extends('layouts.form')

@section('form')
    {!!Form::open(['action' => ['InvitationsController@store', $restaurant_id],'method' => 'POST'])!!}
        {{ Form::bsText('user name','',['placeholder' => 'Name'])}}
        {{ Form::bsSubmit('submit')}}
    {{ Form::close() }}
@endsection
