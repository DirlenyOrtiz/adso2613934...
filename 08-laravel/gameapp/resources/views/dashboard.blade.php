@extends('layouts.app')
@section('title', 'GameApp - dashboard')
@section('class', 'dashboard')

@section('content')

<header>
    <a href="index.html" class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <h1>Dashboard</h1>
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
<nav class="nav">
    <figure class="avatar" >
        <img class="mask" src="images/photo.png" alt="">
        <img class="border" src="images/shape-border.svg" alt="border">
    </figure>
    <div class="ico-squar">
        <img src="images/ico-squar.svg" alt="">
    <h4>Admin</h4>
    <h2>Bianca Fabbri</h2>
    </div>
    <menu>
        <a href="../users/search1.html">
            <img src="images/ico-login.svg" alt="Login">
            My Profile
        </a>
        <a href="{{('dashboard')}}">
            <img src="images/ico-register.svg" alt="Register">
            Dashboard
        </a>
        <a href="javascript:;" onclick="logout.submit();">
            <img src="{{ asset ('images/ico-catalogue.svg') }}" alt="Log out">
            Logout
        </a>
        <form id="logout" action="{{ route('logout')}}" method="post">
            @csrf
        </form>
    </menu>
</nav>
<section class="scroll">
    <article>
        <div class="form-group">
            <aside>
                <img id="upload" class="squar" src="images/squar.svg" alt="photo">
                <span class="count-rows">20 Rows</span>
            </aside>
            <img id="upload" class="option" src="images/users.svg" alt="photo">
            <a href="../07-LAYOUT/users/users.html" class="btn-more">
                view
            </a>
        </div>
        <h4>users</h4>
        <div class="form-group">
            <aside>
                <img id="upload" class="squar" src="images/squar.svg" alt="photo">
                <span class="count-rows">06 Rows</span>
            </aside>
            <img id="upload" class="option" src="images/categories.svg" alt="photo">
            <a href="../07-LAYOUT/categories/categories.html" class="btn-more">
                view
            </a>
        </div>
        <h3>categories</h3>
        <div class="form-group">
            <aside>
                <img id="upload" class="squar" src="images/squar.svg" alt="photo">
                <span class="count-rows">40 Rows</span>
            </aside>
            <img id="upload" class="option" src="images/games.svg" alt="photo">
            <a href="../07-LAYOUT/games/games.html" class="btn-more">
                view
            </a>
        </div>
        <h2>Games</h2>
        <!-----<div class="form-group">
            <button type="submit">
                <img src="images/content-btn-register.svg" alt="login">
            </button>
        </div> ---->
    </article>
</section>
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
