@if ($minified = (App::environment() !== 'development' ? '.min' : false))
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery' . $minified . '.js') }}
    {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.0rc1/angular' . $minified . '.js') }}
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