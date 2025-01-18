<nav>
    <ol class="breadcrumb">
        @foreach ($breadcrumbs->toArray()['breadcrumbs'] as $breadcrumb)
            <li>
                @if (\array_key_exists('url', $breadcrumb))<a href="{{ $breadcrumb['url'] }}">@endif
                {{ $breadcrumb['name'] }}
                @if (\array_key_exists('url', $breadcrumb))</a>@endif
            </li>
        @endforeach
    </ol>
</nav>