@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <div class="invitations">
            @if(isset($user->invitations) && count($user->invitations) > 0)
                <h2>Invitations</h2>
                @foreach($user->invitations as $invitation )
                    @if(!$invitation['accepted'])
                        <div class="card">
                            <div class="card-body">
                                {{ $invitation['restaurant']['name'] }}
                                <div class="float-right">
                                    @include('inc.dashboard.accept-invitation')
                                    @include('inc.dashboard.delete-invitation')
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        <div class="restaurants">
            <h2>
                Restaurants
                <a class="btn btn-primary btn-sm" href="/restaurants/create">
                    Create New Restaurant
                </a>
            </h2>

            @foreach($user->restaurants as $restaurant)
                <div class="restaurant card">
                    <div class="card-body">
                        <h4>
                            <a href="restaurants/{{ $restaurant['id'] }}">
                                {{ $restaurant['name'] }}
                            </a>
                            @include('inc.restaurant-options')
                        </h4>
                        @foreach($restaurant['users'] as $u)
                            <div>
                                {{ $u['username'] }}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


