@extends('layouts.app')
@section('title', 'GameApp - Edit Category')
@section('class', 'editcategory')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@section('content')
    <header>
        <a href="{{ url('categories') }}" class="btn-back">
            <img src="{{asset('images/btn-back.svg')}}" alt="Back">
        </a>
        <h1>Edit</h1>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')


        <div class="form-group">

            <img id="upload" class="mask" src="{{ asset('images/' . $category->image) }}" alt="image">
        </div>
        <form action="{{ url('categories/' . $category->id) }}" method="POST" enctype="multipart/form-data">
            <input id="photo" type="file" name="photo" accept="image/*">
        @csrf
        @method('PUT')
        <section class="scroll">
            <article>
                <div class="form-group">
                    <label>
                        <img src="{{ asset('images/Vector-edit-games.svg') }}" alt="name">
                        <h2>Name:</h2>
                    </label>

                    <input type="text" name="name" value="{{ $category->name }}" maxlength="14">
                </div>
                <div class="form-group">
                    <label>
                        <img src="{{ asset('images/Vector-edit-games.svg') }}" alt="Description">
                        <h2>Description:</h2>
                    </label>


                <textarea name="description" cols="30" rows="10">{{ $category->description }}</textarea>
                <div class="form-group">
                    <button type="submit">
                        <img src="{{asset('images/views/content-btn-edit.svg')}}" alt="save">
                    </button>
                </div>
            </div>

            </article>
        </form>

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
    $togglePass = false
    $('section').on('click', '.ico-eye', function(){
        !$togglePass ? $(this).next().attr('type', 'text')
                    : $(this).next().attr('type', 'password')

        !$togglePass ? $(this).attr('src', "{{ asset ('images/ico-eye.svg')}}")
                    : $(this).attr('src', "{{asset('images/ico-eye-open.svg') }}")

        $togglePass = !$togglePass

    })
     //----------------------------
    $('.border').click(function(e) {
        $('#photo').click()
    })
    $('#photo').change(function(e){
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', event.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })
     //----------------------------
    })
</script>
@if (count($errors->all()) > 0)
@php $error = '' @endphp
@foreach ($errors->all() as $message)
        @php $error .= '<li>' . $message . '</li>' @endphp
@endforeach

<script>
    $(document).ready(function(){
        Swal.fire({
            position: "top",
            title: "ops!",
            html: `@php echo $error @endphp`,
            icon: "error",
            toast: true,
            showConfirmButton: true,
            timer: 5000
        })
    });
</script>
@endif

@endsection
