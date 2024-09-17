@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'my-profile')

@section('content')
    <header>
        <img src="images/logo-dashboard.png" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    <section>
    <figure class="avatar">
            <img class="mask" src="{{asset ('images') . '/' . Auth::user()->photo }}" alt="Photo">
            <img class="border" src="images/shape-border.svg" alt="border">
        </figure>
        <h2>{{ Auth::user()->fullname }}</h2>
        <span class="email"><b>{{ Auth::user()->email }}</b></span>

        <h4>{{ Auth::user()->role}}</h4>
    
        <div class="grid">
                <span class="data data-id">
                <img src="images/ico-data.svg" alt="Id">
                <b>{{ Auth::user()->document }}</b>
                </span>
                <span class="data data-address">
                    <img src="images/ico-data.svg" alt="Address">
                    <b>N/A</b>
                </span>
                <span class="data data-phone-number">
                    <img src="images/ico-data.svg" alt="Phone Number">
                    <b>{{ Auth::user()->phone }}</b>
                </span>
                <span class="data data-birth-date">
                    <img src="images/ico-data.svg" alt="Birth Date">
                    <b>{{ Auth::user()->birthdate }}</b>
                </span>
                <span class="data data-gender">
                    <img src="images/ico-data.svg" alt="Gender">
                    <b>{{ Auth::user()->gender }}</b>
                </span>
                <span class="data data-status">
                    <img src="images/ico-data.svg" alt="Status">
                    <b>Active</b>
                </span>
            </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })

            // $togglePass = false
            // $('section').on('click', '.ico-eye', function() {
            //     !$togglePass ? $(this).next().attr('type', 'text') :
            //         $(this).next().attr('type', 'password') !$togglePass ? $(this).attr('src',
            //             'images/ico-eye-hidden.svg') :
            //         $(this).attr('src', 'images/ico-eye.svg')
            //     $togglePass = !$togglePass
            // })
        })
    </script>
@endsection
