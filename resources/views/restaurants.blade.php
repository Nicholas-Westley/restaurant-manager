@extends('layouts.app')

@section('content')

    <div class="admin-container">
        <a class="btn btn-primary" href="/restaurants/create">
            Create New Restaurant
        </a>
        <div class="restaurants">
            <h2>Restaurants</h2>
            @foreach($user->restaurants as $restaurant)
                <div class="restaurant">
                    <h4>
                        {{ $restaurant['name'] }}
                        <a
                            class="btn btn-secondary btn-sm"
                            href="restaurants/{{ $restaurant['id'] }}/invitations/create">
                            Invite Employee
                        </a>

                        {!!Form::open([
                            'action' => ['RestaurantsController@destroy', $restaurant->id],
                            'onsubmit' => 'return confirm("Are you sure")',
                            'method' => 'POST',
                            'style' => 'display: inline-block;']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::bsSubmit('Delete', ['class'=>'btn btn-danger btn-sm']) }}
                        {{ Form::close() }}
                    </h4>


                    @foreach($restaurant['users'] as $u)
                        {{ $u['username'] }}
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection


