@if (Route::is('frontend.pages.terms') || Route::is('frontend.pages.privacy') || Route::is('frontend.pages.faq') || Route::is('frontend.user.account'))
    @if (isset($content))
        <main class="main-section">
            {{ $content }}
        </main><!--card-->
    @endif
@else
    <main>
        {{ $content }}
    </main>
@endif
