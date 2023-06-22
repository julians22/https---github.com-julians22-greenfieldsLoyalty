{{-- @auth
    @if (!$logged_in_user->isHasDetail())
    <x-utils.alert type="warning" :dismissable="false" class="pt-1 pb-1 mb-0">
        @lang('Your account information is incomplete, please complete it on the My Account page') <a href="{{ route('frontend.user.account') }}">Klik disini</a>
    </x-utils.alert>
    @endif
@endauth --}}


