@extends('layouts.app')
@section('title', 'GameApp - Edit User')
@section('class', 'edit register')

@section('content')
    <header>
        <a href="{{url('users')}}" class="btn-back">
            <img src="{{asset('../images/btn-back.svg')}}" alt="Back">
        </a>
        <h1>Edit</h1>
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
        <form action="{{url('users/' .$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <img id="upload" class="mask" src="{{asset('images' . $user->photo)}}" alt="photo">
                <img class="border" src="{{asset('../images/shape-border.svg')}}" alt="border">
                <input id="photo" type="file" name="photo" accept="images/*">
                <input type="hidden" name="originphoto" value="{{( $user->photo)}}">
                <input type="hidden" name="id" value="{{( $user->id)}}">
            </div>
            <div class="form-group">
                <label>
                    <img src="{{asset('images/ico-fullname.svg')}}" alt="document">
                    Document:
                </label>
                <input type="text" name="document" placeholder="12323456" value="{{old('document', $user->fullname) }}">
            </div>
            <div class="form-group">
                <label>
                    <img src="{{asset('../images/ico-fullname.svg')}}" alt="FullName">
                    Fullname:
                </label>
                <input type="text" name="fullname" placeholder="Rosa Perez">
            </div>
            <div class="form-group">
            <label>
                <img src="images/ico-fullname.svg" alt="gender">
                Gender:
            </label>
            <input type="text" name="gender" placeholder="Female" value="{{old('gender', $user->gender) }}">
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
                <button type="submit">
                    <img src="../images/views/content-btn-add.svg" alt="edit">
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
    //---------------------------
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
@endsection
