<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
    <header>
        <div>
            @guest
                <li><a href="{{ route('login') }}">Логин</a></li>
                <li><a href="{{ route('register') }}">Регистрация</a></li>
            @else
                <a href="{{ route('admin') }}">Admin Panel</a>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                Выход
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </div>
    </header>
    <body>
    @yield('content')

    </body>
</html>
