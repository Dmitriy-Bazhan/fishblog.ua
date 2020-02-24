<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Registration</title>
    <link href="{{ asset($reg_param['css_app']) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset($reg_param['css_bootstrap']) }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset($reg_param['css_myStyle']) }}" rel="stylesheet" type="text/css"/>
    <style>
        body {
            background-image: url("{{ asset($reg_param['background_image']) }} ");
            background-attachment: fixed;
            background-size: cover;

        }
    </style>
</head>
<body>
@include('common.show_errors')

@if(!empty($reg_param['errors']))
    @foreach($reg_param['errors'] as $value)
        <p class="errors_letters">{{ $value }}</p>
    @endforeach
@endif

<div id="reg_menu_main_div">
    <form action="registration_form" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="inputLogin" class="label_color">Логин</label>
            <input type="text" class="form-control" id="inputLogin" name="login" value="{{ old('login') }}">
        </div>
        <div class="form-group">
            <label for="inputPassword" class="label_color">Пароль</label>
            <input type="password" class="form-control" id="inputPassword" name="password"
                   value="{{ old('password') }}">
        </div>
        <div class="form-group">
            <label for="inputPassword2" class="label_color">Повторите пароль</label>
            <input type="password" class="form-control" id="inputPassword2" name="password2"
                   value="{{ old('password2') }}">
        </div>
        <div class="form-group">
            <label for="inputEmail" class="label_color">Почта</label>
            <input type="email" class="form-control" id="inputemail" name="email"
                   value="{{ old('email') }}">
        </div>

        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>

<a class="btn btn-danger back_button" href="Back_to_mainpage">На главную</a>

<script src="{{ asset($reg_param['js_app']) }}" type="text/javascript"></script>
<script src="{{ asset($reg_param['js_bootstrap']) }}" type="text/javascript"></script>
<script src="{{ asset($reg_param['js_jquery']) }}" type="text/javascript"></script>
<script src="{{ asset($reg_param['js_popper']) }}" type="text/javascript"></script>
<script src="{{ asset($reg_param['my_jquery_script']) }}" type="text/javascript"></script>

</body>
</html>
