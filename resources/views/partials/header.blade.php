<header>
    <section>        
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="w-100 row justify-content-between align-items-center">
                    <!-- Left Side Of Navbar -->
                    <div class="col-4">
                        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                        <img class="logo" src="{{Vite::asset('resources/img/crit.png')}}" alt="">

                            {{-- config('app.name', 'Laravel') --}}
                        </a>
    
                    </div>
                    <!-- Central Side Of Navbar -->
                    <div class="col-4">
                        <!-- Button for Small Responsive Layout -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <!-- Content of the Button for Small Responsive Layout -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="w-100 navbar-nav d-flex align-items-center justify-content-center gap-3">
                                <!-- Homepage -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                                </li>
                                <!-- Admin Items -->
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.items.index')}}">{{ __('Items') }}</a>
                                </li>
                                @endif
                                <!-- Admin Index -->
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.characters.index')}}">{{ __('Characters') }}</a>
                                </li>
                                @else 
                                <!-- Guest Index -->
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('guest.characters.index')}}">{{ __('Characters') }}</a>
                                </li>
                                @endif
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.types.index')}}">{{ __('Classes') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
    
                    <!-- Right Side Of Navbar -->
                    <div class="col-4">
                        <ul class="navbar-nav d-flex align-items-center justify-content-end ">
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
        
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                        <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</header>