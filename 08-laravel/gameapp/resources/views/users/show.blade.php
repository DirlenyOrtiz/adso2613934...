@extends('layouts.app')
@section('title', 'GameApp - Show User')
@section('class', 'my-profile')

@section('content')
<main class="my-profile">
    <header>
        <a href="{{url('users')}}" class="btn-back">
            <img src="{{asset('images/btn-back.svg')}}" alt="Back">
        </a>
        <h1>Show My Profile</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path
                class="line top"
                d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path
                class="line middle"
                d="m 70,50 h -40" />
            <path
                class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')'0
    <section>
        <figure class="avatar" >
            <img class="mask" src="{{asset('images') . '/' . $user->photo }}" alt="Photo">
            <img class="border" src="{{asset('../images/shape-border.svg')}}" alt="border">
        </figure>
        <h2>{{$user->fullname}}</h2>
        <span class="email"><b>{{$user->email}}</b></span>
        <span class="role">
            <img src="{{asset('../images/views/ico-role.svg')}}" alt="role">
            <h3>{{$user->role}}</h3>
        </span>
        <div class="grid">
            <span class="data data-id">
            <img src="{{asset('../images/ico-data.svg')}}" alt="Id">
            <b>{{$user->document}}</b>
            </span>
            <span class="data data-address">
                <img src="{{asset('../images/ico-data.svg')}}" alt="Address">
                <b>N/A</b>
            </span>
            <span class="data data-phone-number">
                <img src="{{asset('../images/ico-data.svg')}}" alt="Phone Number">
                <b>{{$user->phone}}</b>
            </span>
            <span class="data data-birth-date">
                <img src="{{asset('../images/ico-data.svg')}}" alt="Birth Date">
                <b>{{$user->birthdate}}</b>
            </span>
            <span class="data data-gender">
                <img src="{{asset('../images/ico-data.svg')}}" alt="Gender">
                <b>{{$user->gender}}</b>
            </span>
            <span class="data data-status">
                <img src="{{asset('../images/ico-data.svg')}}" alt="Status">
                <b>Active</b>
            </span>
        </div>
    </section>
</main>
@endsection
@section('js')

<script>
    $(document).ready(function () {

        $('header').on('click', '.btn-burger', function(){
        $(this).toggleClass('active')
        $('.nav').toggleClass('active')
        })
    //----------------------------
    })
</script>


@endsection
