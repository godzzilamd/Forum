<nav class="navbar navbar-expand-md navbar-dark shadow-sm" style="background-color:black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/banner.png') }}" alt="Logo" style="width:40px;">
            </a>
            <a class="navbar-brand" href="{{ url('/forums') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/forums">{{__('messages.Forums')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.Albums')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.News')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.Search')}}</a>
                    </li>
                    @if (Auth::user() && Auth::user()->hasPermission(21))
                    <li class="nav-item">
                            <a class="nav-link" href="#">{{__('messages.Panel')}}</a>
                        </li>    
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <div class="text-light mt-2 mr-2"><a href="/user/{{ auth()->user()->id }}" class="text-white" style="text-decoration:none">{{ auth()->user()->name }}</a></div>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-light" type="submit" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{__('messages.Logout')}}</button>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout', app()->getLocale()) }}"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
                <div class="dropdown ml-3">
                        <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('messages.Language')}}
                        </a>
    
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('locale/en') }}">EN</a>
                            <a class="dropdown-item" href="{{ url('locale/ro') }}">RO</a>
                            <a class="dropdown-item" href="{{ url('locale/ru') }}">RU</a>
                        </div>
                    </div>
            </div>
        </div>
    </nav>