<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
        <form class="d-flex" role="search" style="width: 30em ; display:flex" action="{{url('/Search')}}">
            <input class="form-control me-2 " id="searchid" type="search" name="query" placeholder="Search Product" >
             <button class="btn btn-outline-light   "  style="width:70px " type="submit"><i class="fa fa-search"></i> </button>
            </form>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li> --}}



            {{-- <li class="nav-item">
              <a class="nav-link" href=" {{url('/Login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/Register')}}">Register</a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="{{ url('/category') }}">Categories</a>
            </li>

            @if (Route::has('login'))

                @auth

                    {{-- <li class="nav-item ">       
                <a  class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a> --}}
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link  dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="slaman"> {{ Auth::user()->name }}</span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                            <li>
                                <a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a>
                            </li>
                            <li>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">


                        <a class="nav-link" href="{{ url('/cart') }}"> Cart
                            <i class="fa fa-shopping-cart "></i>
                            <span class="badge badge-pill text-white-50  bg-secondary cart-count">0</span>

                        </a>

                    </li>
                    <li class="nav-item me-1 ">


                        <a class="nav-link" href="{{ url('/whishlist') }}"> Whishlist

                            <i class="fa fa-heart"></i>
                            <span class="badge badge-pill  text-white-50  bg-secondary  wish-count">0</span>

                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                @endauth

            @endif

            {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
        </ul>
    </div>
</nav>
