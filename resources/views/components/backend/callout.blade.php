@props(['type' => 'secondary', 'count' => 0, 'title' => 'Callout Title'])

<div class="c-callout c-callout-{{$type}} b-t-1 b-r-1 b-b-1 px-4 py-3">
    <p class="h6 mb-4">
        <span class="text-muted">{{ $title }}</span>
        <br>
        <br>
        <strong class="h3">{{ number_format($count) }}</strong>
    </p>
    @if (isset($link))
        <div>
            {{$link}}
        </div>
    @endif
</div>
