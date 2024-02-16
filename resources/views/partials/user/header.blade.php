<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{'index'}}">PROJECT START</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('gallery') }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('upload')}}">Photo upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('balance')}}">Balance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}"><u style="color:orange">({{ Auth::user()->username }})</u> logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
