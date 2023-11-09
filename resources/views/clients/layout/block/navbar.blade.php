<header id="header">
    <div class="container">
        <div class="row">

            <div class="col-md-2">
                <div class="main-logo">
                    <a href="{{route('clients.homeClient')}}"><img src="{{asset('assets/images/main-logo.png')}}" alt="logo"></a>
                </div>

            </div>

            <div class="col-md-10">

                <nav id="navbar">
                    <div class="main-menu stellarnav">
                        <ul class="menu-list">
                            <li class="menu-item active"><a href="{{route('clients.homeClient')}}" data-effect="Home">Home</a></li>
                            <li class="menu-item"><a href="{{route('clients.bookcase')}}" class="nav-link" data-effect="Shop">Book Case</a>
                            </li>
                            <li class="menu-item"><a href="{{route('clients.about')}}" class="nav-link" data-effect="About">About</a></li>

                            <li class="menu-item"><a href="{{route('clients.contact')}}" class="nav-link" data-effect="Contact">Contact</a>
                            </li>
                        </ul>

                        <div class="hamburger">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>

                    </div>
                </nav>

            </div>

        </div>
    </div>
</header>