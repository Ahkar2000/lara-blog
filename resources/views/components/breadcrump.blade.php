<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        @foreach ($links as $name=>$link)
            @if ($loop->last)
                <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ $name }}</li>
            @else
                <li class="breadcrumb-item text-capitalize"><a href="{{ $link }}">{{ $name }}</a></li>
            @endif
        @endforeach        
    </ol>
</nav>