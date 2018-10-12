@extends('layouts.app')

@section('content')
    <script>
        window.restaurant = {{ $restaurant_id }}
        window.user_settings = {!! json_encode($settings) !!}
    </script>
    <div id="vue">

    </div>
@endsection

