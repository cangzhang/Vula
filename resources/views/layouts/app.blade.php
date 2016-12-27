<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/app.css" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>

<body>
<div id="app">
    @if (Auth::check())
        <nav-log-out></nav-log-out>
    @else
        <div class="login" id="login">
            <nav-login></nav-login>
        </div>
    @endif
    <div id="main"></div>
    {{--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>--}}
</div>

{{--@yield('content')--}}

<!-- Scripts -->
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
