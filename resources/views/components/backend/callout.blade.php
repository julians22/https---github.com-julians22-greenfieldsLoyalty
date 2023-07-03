@props(['type' => 'secondary', 'count' => 0, 'title' => 'Callout Title'])

<div class="c-callout c-callout-{{$type}} b-t-1 b-r-1 b-b-1 p-2">
    <p>
        <small class="text-muted">{{ $title }}</small><br>
        <strong class="h4">{{ number_format($count) }}</strong>
    </p>
    @if (isset($link))
        <div>
            {{$link}}
        </div>
    @endif
</div>
