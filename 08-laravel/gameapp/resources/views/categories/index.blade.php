@extends('layouts.app')
@section('title', 'GameApp - Categories Module')
@section('class', 'users')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <main class="categories">
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="{{asset('../images/btn-back.svg')}}" alt="Back">
        </a>
        <h2>Categories</h2>
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('menuburger')

    <div>
        <a class="add" href="{{ url('categories/create') }}">
            <img src="{{asset('../images/btn-squar.svg')}}" alt="add">
            <strong>add</strong>
        </a>
        <div class="options">
            <input type="text" name="qsearch" id="qsearch" placeholder="Search">
        </div>
    </div>
    <section class="scroll">
        <div id="list">
            @foreach ($categories as $category)
            <article>
                <div class="form-group">
                    <aside>
                        <img class="more11" src="{{asset('../images/btn-more1.svg')}}" alt="">
                        <img id="upload" class="squar" src="{{asset('../images/squarsmall.svg')}}" alt="">
                        <span class="count-rows">{{ $category->name }}</span>
                        <strong>{{ $category->manufacturer }}</strong>
                    </aside>
                    @csrf
                    <img id="list" class="option" src="{{ asset('images') . '/' . $category->image }}" alt="Photo">
                    <a href="javascript:;" class="delete" data-fullname="{{ $category->name }}">
                        <img class="delete" src="{{asset('../images/icons-delete.svg')}}" alt="">
                    </a>
                    <a href="{{ url('categories/' . $category->id) }}">
                        <img class="search" src="{{asset('../images/icons-search.svg')}}" alt="">
                    </a>
                    <a href="{{ url('categories/' . $category->id . '/edit') }}">
                        <img class="add1" src="{{asset('../images/icons-add1.svg')}}" alt="">
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    <div class="paginate">
        {{ $categories->links('layouts.paginator') }}
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.loader').hide()
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        })

        @if (session('message'))
            Swal.fire({
                position: "top",
                title: '{{ session('message') }}',
                icon: "success",
                toast: true,
                timer: 5000
            })
        @endif

        $('figure').on('click', '.delete', function() {
            $fullname = $(this).attr('data-fullname')

            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to delete: " + $fullname,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#240b34",
                toast:true,
                cancelButtonColor: "#891652",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).next().submit()
            }
            });
        })

        $('body').on('keyup', '#qsearch', function (e){
            e.preventDefault()
            $query = $(this).val()
            $token = $('input[name=_token]').val()
            $model = 'categories'

            $('.loader').show()
            $('#list').hide()

            setTimeout(() => {
                $.post($model + '/search',
                    { q: $query, _token: $token },
                function (data) {
                    $('#list').html(data)
                    $('.loader').hide()
                    $('#list').fadeIn('slow')
                }
            )
        }, 1000);
        })
    })
</script>
@endsection
