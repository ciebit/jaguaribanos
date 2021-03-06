<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>@yield('title')Jaguaribanos</title>

        <meta name="author" content="Ciebit">
        <meta name="description" content="Personalidades da cidade de Jaguaribe, Ceará, Brasil">
        @stack('meta')

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pridi"/>
        @stack('style')
        @stack('script')
    </head>
    <body>
        @yield('content')
    </body>
</html>
