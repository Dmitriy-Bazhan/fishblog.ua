<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/myStyle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        body
        {
            {{--background-image: url("{{ asset('image/Lake01.jpg') }}");--}}
            {{--background-attachment: fixed;--}}
            {{--background-size: cover;--}}
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light my-header">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php if($loyoutParam['role'] == 'not_login') : ?>
                    <form class="form-inline my-2 my-lg-0" action="autorize" method="POST">
                         {{ csrf_field() }}
                         <input name="login" type="text" placeholder="Логин" class="form-control mr-sm-2">
                         <input name="password" type="password" placeholder="Пароль" class="form-control mr-sm-2">
                         <button type="submit" class="btn btn-primary">Войти</button>
                         <a class="btn btn-danger button-reg" href="registaration">Регистрация</a>
                    </form>
                <?php endif; ?>
                <?php if($loyoutParam['role'] == 'user') : ?>
                    <button class="btn btn-primary">Привет : <?= $loyoutParam['username'];?></button>
                    <a class="btn btn-primary" href="profile">Профиль</a>
                    <a class="btn btn-danger" href="loginout">Выйти</a>
                <?php endif; ?>
                <?php if($loyoutParam['role'] == 'admin') : ?>
                    <button class="btn btn-primary">Привет админ: <?= $loyoutParam['username'];?></button>
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





<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-3.4.1.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
</body>
</html>
