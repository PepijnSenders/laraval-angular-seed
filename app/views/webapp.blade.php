<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body ng-app="app">

        @if ($minified = (Sledgehammer\ENVIRONMENT !== 'development') ? '.min' : false)
            {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery' . $minified . '.js') }}
            {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular' . $minifed . '.js') }}
        @else
            {{ HTML::script('js/libs/jquery/jquery' . $minified . '.js') }}
            {{ HTML::script('js/libs/angular/angular' . $minified . '.js') }}
        @endif

        {{ HTML::script('js/app.js') }}

        @foreach (array('controllers', 'directives', 'services', 'models') as $dir)
            @foreach (new DirectoryIterator(public_path() . '/js/' . $dir) as $entry)
                @if ($entry->isFile() && $entry->getExtension() === 'js')
                    {{ HTML::script('js/' . $dir . '/' . $entry->getFilename()) }}
                @endif
            @endforeach
        @endforeach

        @include('statusbar')

    </body>
</html>