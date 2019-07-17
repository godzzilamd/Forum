<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/banner.png') }}" alt="Logo" style="width:40px;">
                </a>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('messages.Name')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('messages.Forums')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('messages.Albums')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{__('messages.News')}}</a>
                </li>
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">{{ __('messages.Login') }}</a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">{{ __('messages.Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.Search')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{__('messages.Panel')}}</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-success" type="submit" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">{{__('messages.Logout')}}</button>
                    </li>

                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('messages.Language')}}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ url('locale/en') }}">EN</a>
                        <a class="dropdown-item" href="{{ url('locale/ro') }}">RO</a>
                        <a class="dropdown-item" href="{{ url('locale/ru') }}">RU</a>
                    </div>
                </div>
            </ul>
        </div>
    </ul>
</nav>