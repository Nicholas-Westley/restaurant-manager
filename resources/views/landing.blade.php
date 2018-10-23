@extends('layouts.app')

@section('content')
    <div class="landing-container">
        <div class="tag">
            Control Every Aspect of your Restaurant
            <div class="sub-tag">
                Running a restaurant is hard.
                We take care of the boring stuff while you take care of everything else.
            </div>
        </div>

        <div class="action-container">
            <a href="{{ route('register') }}">
                <button
                    class="btn btn-primary btn-lg btn-block btn-huge">
                    Start Managing
                </button>
            </a>
            <a href="{{ route('login') }}">
                or sign in
            </a>
        </div>
    </div>

@endsection
