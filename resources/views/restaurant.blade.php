@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <h2>
            {{ $restaurant['name'] }}
            @include('inc.restaurant-options')
        </h2>
        <h3>
            Recipes
            <a
                class="btn btn-primary btn-sm"
                href="/restaurant/{{ $restaurant['id'] }}/recipes/create">
                Create New Recipe
            </a>
        </h3>

        @foreach($restaurant['recipes'] as $recipe)
            <div class="card">
                <div class="card-body">
                    <h4>{{ $recipe['name'] }}</h4>
                    <h5>{{ $recipe['description'] }}</h5>
                    @foreach($recipe['ingredients'] as $ingredient)
                        <div>
                            <label>
                                <input
                                    type="checkbox"
                                    disabled
                                    {{ $ingredient['selected_by_default'] ? 'checked' : '' }}
                                />
                                {{ $ingredient['name'] }}
                            </label>

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
