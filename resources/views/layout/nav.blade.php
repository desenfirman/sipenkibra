<!--Navbar-->
<nav class="navbar navbar-toggleable-md navbar-dark" style="background-color: #039BE5;">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" style="color:#040404;" href="#">
            <strong>SIPENKIBRA</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{{ (Request::is('/') ? 'active' : '') }}}">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item {{{ (Request::is('/artists')  ? 'active' : '') }}}">
                            <a class="nav-link" href="/artists">Artists</a>
                        </li>
                        <li class="nav-item {{{ (Request::is('/artists')  ? 'active' : '') }}}">
                            <a class="nav-link" href="/albums">Albums</a>
                        </li>

                    @endif

                    @if(! Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endif
                </ul>

                <ul class="nav navbar-nav ml-auto">
                    @if(Auth::check())
                    <li class="nav-item navbar-right nav-link">
                        You are signed in as <a href="/profile/{{Auth::user()->id}}">{{ Auth::user()->username }}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    @endif
                </ul>
                <!--<form class="form-inline waves-effect waves-light">
                <input class="form-control" type="text" placeholder="Search">
            </form>-->
        </div>
    </div>
</nav>



<!--<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <a class="navbar-brand" href="#">Logo</a>

    <div class="collapse navbar-collapse" >

        <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
             <a class="nav-link" href="/">Home</a>
         </li>
         @if(! Auth::check())
         <li class="nav-item active">
            <a class="nav-link" href="/register">Register</a>
        </li>

        <li class="nav-item active">
            <a class="nav-link" href="/login">Login</a>
        </li>
        @endif
    </ul>

    <ul class="nav navbar-nav navbar-right">
     @if(Auth::check())
     <li class="nav-item navbar-right nav-link">
        You are signed in as {{ Auth::user()->username }}
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/logout">Logout</a>
    </li>
    @endif
</ul>
</div>
</nav>-->
