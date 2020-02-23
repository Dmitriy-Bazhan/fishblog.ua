<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Fish_Blog</title>
    <link href="{{ asset($loyoutParam['css_app']) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset($loyoutParam['css_bootstrap']) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset($loyoutParam['css_myStyle']) }}" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-image: url("{{ asset($loyoutParam['background_image']) }} ");
            background-attachment: fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light my-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php if(session('role') == 'not_login') : ?>
                <form class="form-inline my-2 my-lg-0" action="autorize" method="POST" id="form_of_login">
                    {{ csrf_field() }}
                    <input name="login" type="text" placeholder="Логин" class="form-control mr-sm-2"
                           value="{{ old('login') }}">
                    <input name="password" type="password" placeholder="Пароль" class="form-control mr-sm-2"
                           value="{{ old('password') }}">
                    <button id="push_to_login" type="submit" class="btn btn-primary">Войти</button>
                    <a class="btn btn-danger button-reg" href="registration">Регистрация</a>
                </form>
                <?php endif; ?>
                <?php if(session('role') == 'user') : ?>
                <button class="btn btn-primary">Привет : <?= session('username');?></button>
                <a class="btn btn-primary" href="profile">Профиль</a>
                <a class="btn btn-danger" href="loginout">Выйти</a>
                <?php endif; ?>
                <?php if(session('role') == 'admin') : ?>
                <button class="btn btn-primary">Привет админ: <?= session('username');?></button>
                <a class="btn btn-primary" href="adminroom">Администрация</a>
                <a class="btn btn-primary" href="profile">Профиль</a>
                <a class="btn btn-danger" href="loginout">Выйти</a>
                <?php endif; ?>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0">
            {{ csrf_field() }}
            <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
        </form>
    </div>
</nav>
@if (session('user_not_exists') == 'yep')
    <p style="color:red;">This login not exists or incorrect password</p>
@endif

@include('common.show_errors')

@yield('mainpage')

<script src="{{ asset($loyoutParam['js_app']) }}" type="text/javascript"></script>
<script src="{{ asset($loyoutParam['js_bootstrap']) }}" type="text/javascript"></script>
<script src="{{ asset($loyoutParam['js_jquery']) }}" type="text/javascript"></script>
<script src="{{ asset($loyoutParam['js_popper']) }}" type="text/javascript"></script>
<script src="{{ asset($loyoutParam['my_jquery_script']) }}" type="text/javascript"></script>

</body>
</html>
