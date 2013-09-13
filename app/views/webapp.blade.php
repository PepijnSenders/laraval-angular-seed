<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="./css/main.css">
        {{ HTML::style('css/main.css?' . filemtime(public_path() . '/css/main.css')) }}
    </head>
    <body ng-app="app">

        @include('assets')

    </body>
</html>