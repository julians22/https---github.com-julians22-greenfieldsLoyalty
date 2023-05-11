@if (Route::is('frontend.pages.terms') || Route::is('frontend.pages.privacy') || Route::is('frontend.pages.faq') || Route::is('frontend.user.account'))
    @if (isset($content))
        <main class="main-section">
            @include('includes.partials.messages')

            {{ $content }}
        </main><!--card-->
    @endif
@else
    <main>
        @include('includes.partials.messages')

        {{ $content }}
    </main>
@endif
