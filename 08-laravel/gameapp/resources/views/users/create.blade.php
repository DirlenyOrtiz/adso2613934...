@extends('layouts.app')
@section('title', 'GameApp - Create User')
@section('class', 'add register')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<header>

    <a href="{{url('users')}}" class="btn-back">
        <img src="{{asset('../images/btn-back.svg')}}" alt="Back">
    </a>
    <h1>add</h1>
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
@include('menuburger')

    <section class="scroll">
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <img id="upload" class="mask" src="../images/bg-upload-photo.svg" alt="photo">
                <img class="border" src="../images/shape-border.svg" alt="border">
                <input id="photo" type="file" name="photo" accept="images/*">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-fullname.svg" alt="FullName">
                    Fullname:
                </label>
                <input type="text" name="fullname" placeholder="Rosa Perez">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-emaild.svg" alt="Email">
                    Email:
                </label>
                <input type="email" name="email" placeholder="dirlortr@gmail.com">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-phone.svg" alt="phone">
                    Phone Number:
                </label>
                <input type="text" name="text" placeholder="320XXXXXXXX">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-birthdate.svg" alt="text">
                    Birth Date:
                </label>
                <input type="text" name="text" placeholder="1980-10-10">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-password2.svg" alt="password">
                    Password:
                </label>
                <img class="ico-eye" src="../images/ico-eye.svg" alt=" ">
                <input type="password" name="password" placeholder="dontmesswithmydog">
            </div>
            <div class="form-group">
                <label>
                    <img src="../images/ico-password2.svg" alt="password">
                    Confirm Password:
                </label>
                <img class="ico-eye" src="../images/ico-eye.svg"" alt=" ">
                <input type="password" name="password_confirmation" placeholder="dontmesswithmydog">
            </div>
            <div class="form-group">
                <button type="submit">
                    <img src="../images/views/content-btn-add.svg" alt="login">
                </button>
            </div>
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
