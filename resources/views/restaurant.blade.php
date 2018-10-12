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
                href="/restaurants/{{ $restaurant['id'] }}/recipes/create">
                Create New Recipe
            </a>
        </h3>

        @foreach($restaurant['recipes'] as $recipe)
            <div class="card">
                <div class="card-body">
                    <h3>
                        {{ $recipe['name'] }}
                        @include('inc.recipe-options')
                    </h3>
                    <h4>{{ $recipe['description'] }}</h4>
                    @foreach($recipe['ingredients'] as $ingredient)
                        <div>
                            <label class="ingredient-label">
                                <a  style="font-size: 160%"
                                    href="/restaurants/{{$restaurant['id']}}/recipes/{{ $recipe['id']  }}/ingredients/{{ $ingredient['id']  }}/edit">
                                    {{ $ingredient['name'] }}
                                </a>
                                (
                                <label>
                                    <input
                                            type="checkbox"
                                            disabled
                                            {{ $ingredient['optional'] ? 'checked' : '' }}
                                    />
                                    Optional
                                </label>
                                <label>
                                    <input
                                            type="checkbox"
                                            disabled
                                            {{ $ingredient['selected_by_default'] ? 'checked' : '' }}
                                    />
                                    Selected By Default
                                </label>
                                )
                                @include('inc.form-components.delete-ingredient')
                            </label>
                        </div>
                    @endforeach
                    <a
                        class="btn btn-success btn-sm"
                        href="/restaurants/{{$restaurant['id']}}/recipes/{{$recipe['id']}}/ingredients/create">
                        Add
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
