<nav {{$attributes}}>
        <ul class="flex space-x-4 text-slate-x-500">
            @foreach($links as $link => $route)
            <li>
                ->
            </li>
            <li>
                <a href="{{$route}}">
                    {{$link}}
                </a>
            </li>
            @endforeach

        </ul>
</nav>