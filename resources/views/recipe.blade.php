@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <h2>
            {{ $recipe['name'] }}
            @include('inc.recipe-options')
        </h2>
        {{ $recipe['description'] }}
    </div>
@endsection
