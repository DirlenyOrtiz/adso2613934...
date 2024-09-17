@guest
    <nav class="nav">
        <img src="{{ asset('images/title-menu.svg') }}" alt="" class="title-menu">
        <menu>
            <a href="{{ url('login') }}">
                <img src="{{ asset('images/ico-login.svg') }}" alt="Login">
                Login
            </a>
            <a href="{{ url('register') }}">
                <img src="{{ asset('images/ico-register.svg') }}" alt="Register">
                Register
            </a>
            <a href="{{ url('catalogue') }}">
                <img src="{{ asset('images/ico-catalogue.svg') }}" alt="Catalogue">
                Catalogue
            </a>
        </menu>
    </nav>
@endguest

@auth
    <nav class="nav">
        <figure class="avatar">
            <img class="mask" src="{{asset('images') . '/' . Auth::user()->photo}}" alt="Photo">
            <img class="border" src="{{asset('images/shape-border.svg')}}" alt="border">
        </figure>
        <div class="ico-squar">
        <h2>{{ Auth::user()->fullname }}</h2>
        <h4>{{ Auth::user()->role }}</h4>
        </div>
        <menu>
            <a href="{{url('myprofile')}}">
                <img src="../images/ico-login.svg" alt="">
                My Profile
            </a>
            <a href="{{url('dashboard')}}">
                <img src="../images/ico-register.svg" alt="">
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
@endauth
