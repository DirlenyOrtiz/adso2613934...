@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')

@section('content')
<header>
            <img src="{{asset('images/logowelcome.png')}}" alt="">
</header>
        <section class="owl-carousel owl-theme">
            <img src=" {{asset('images/slide-01.png')}}" alt="slide01">
            <img src=" {{asset('images/slide-02.png')}}" alt="slide02">
            <img src=" {{asset('images/slide-03.png')}}" alt="slide03">
        </section>
        <footer>
            <a href="{{url('catalogue')}}" class="btn btn-explore">enter</a>
        </footer>
            <div>
                <img src="{{asset('images/imgicono.png')}}" alt="" class="imgicono">
            </div>

@endsection

@section('js')
<script>
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        center: true,
        loop:true,
        margin:10,
        nav:true,
        dots: false,
        responsive:{
            0:{
                items:1
            }
        }
    })
})
</script>
@endsection
