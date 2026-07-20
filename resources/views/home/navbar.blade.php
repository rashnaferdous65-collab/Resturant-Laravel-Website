 <nav class="custom-navbar navbar navbar-expand-lg navbar-dark fixed-top" data-spy="affix" data-offset-top="10">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#gallary">Gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-table">Book-Table</a>
                </li>
            </ul>
            <a class="navbar-brand m-auto" href="{{url('/')}}">
                <img src="assets/imgs/logo.svg" class="brand-img" alt="">
                <span class="brand-txt">Food Hut</span>
            </a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Food<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testmonial">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>
                              @auth 
    <li class="nav-item"><a href="{{url('my_cart')}}"   class="nav-link" >Cart</a></li>
                         
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <input type="submit" value="Logout" class="btn btn-primary text-white">
    </form>
@endauth

@guest
    <li class="nav-item"><a href="{{ route('login') }}"   class="nav-link" >Log In</a></li>
    <li class="nav-item"><a href="{{ route('register') }}"   class="nav-link" >Register</a></li>
@endguest
            </ul>
        </div>
    </nav>