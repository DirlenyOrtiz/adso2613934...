@extends('layouts.app')
@section('title', 'GameApp - Show Category')
@section('class', 'my-profile')

@section('content')
    <header>
        <a href="{{ url ('categories') }}" class="btn-back">
            <img src="../images/btn-back.svg" alt="Back">
        </a>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')
    <section class="show-category">
    <figure class="avatar">
            <img class="mask1" src="{{asset ('images') . '/' . $category->image }}" alt="Photo">
            <!--<img class="border" src="{{ asset ('../imagess/border-category.svg') }}" alt="border"> -->
        </figure>
        <h2>{{ $category->name }}</h2>
            <span class="email"><b>{{ $category->manufacturer }}</b></span>

            <div class="grid">
                <span class="data data-id">
                    <img src="{{('../images/check.svg')}}" alt="Id">
                    <b>{{ $category->name }}</b>
                </span>
                <span class="data data-address">
                    <img src="{{('../images/ico-birthdates.svg')}}" alt="Address">
                    <b>{{ $category->releasedate }}</b>
                </span>

            </div>
            <div class="description">
                <textarea name="" id="" disabled>{{ $category->description }}</textarea>
            </div>

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
        })
    </script>
@endsection
