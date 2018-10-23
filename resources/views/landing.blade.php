@extends('layouts.app')

@section('content')
    <div class="landing-container">
        <div class="tag">
            Control Every Aspect of Your Restaurant
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
                or login
            </a>
        </div>

        <div class="showoff" style="background-color: #FFA72E; margin-top: 120px">
            <div class="item">
                <div class="img-container">
                    <img src="/assets/images/landing/pos-app.png" />
                </div>
                <div class="explanation">
                    <div class="explanation-title">POS app for taking orders.</div>
                    3 Different Modes
                    <ul>
                        <li>Customer mode for tablet based ordering menu</li>
                        <li>Chef mode for organising food.</li>
                        <li>Cashier mode for taking orders and viewing progress</li>
                    </ul>
                    Available on desktop and mobile (ios & Android).

                </div>
            </div>
        </div>

        <div class="showoff" style="background-color: #3490DC;">
            <div class="item">
                <div class="explanation">
                    <div class="explanation-title">Open Source.</div>
                    Due to it's open source nature if you don't like any part of Restaurant Manager or want to make changes you can clone the repo and implement changes yourself or ask us to make changes for you.
                </div>
                <div class="img-container">
                    <img src="/assets/images/landing/opensource.png" />
                </div>
            </div>
        </div>

        <div class="showoff" style="background-color: #FFA72E;">
            <div class="item">
                <div class="img-container">
                    <img src="/assets/images/landing/shaking-hands.jpg" />
                </div>
                <div class="explanation">
                    <div class="explanation-title">Free to Use.</div>
                    We make money from consultancy so using Restaurant Manager will be totally free to you.
                </div>
            </div>
        </div>

        <div class="tag">
            <div class="sub-tag">
                Don't delay, sign-up is free.
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

        <div style="text-align: center;">
            &copy; Nicholas Westley 2018.
        </div>
    </div>


@endsection
