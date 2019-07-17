<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/banner.png') }}" alt="Logo" style="width:40px;">
            </a>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                @endguest
                </ul>
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
            </div>
        </div>
    </nav>