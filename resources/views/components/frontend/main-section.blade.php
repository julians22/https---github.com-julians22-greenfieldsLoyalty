@if (
    Route::is('frontend.pages.terms') ||
    Route::is('frontend.pages.privacy') ||
    Route::is('frontend.pages.faq') ||
    Route::is('frontend.user.account') ||
    Route::is('frontend.user.edit-account'))
    @if (isset($content))
        <main class="main-section" id="main-single-nav">
            @include('includes.partials.messages')

            {{ $content }}
        </main><!--card-->
    @endif
@else
    <main id="main-single-nav">
        @include('includes.partials.messages')

        {{ $content }}
    </main>
@endif
