<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PortalCursos</title>
</head>
<body>

    <a href="{{ route('profile.show') }}">Perfil</a><br>
    <a href="{{  route('logout') }}">logout</a>

    @yield('content')


</body>
</html>
