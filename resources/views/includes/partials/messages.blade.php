@if(isset($errors) && $errors->any())
    <x-utils.alert type="danger" class="header-message">
        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </x-utils.alert>
@endif

@if(session()->get('flash_success'))
    <x-utils.alert type="success" class="header-message">
        {{ session()->get('flash_success') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_warning'))
    <x-utils.alert type="warning" class="header-message">
        {{ session()->get('flash_warning') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_info') || session()->get('flash_message'))
    <x-utils.alert type="info" class="header-message">
        {{ session()->get('flash_info') }}
    </x-utils.alert>
@endif

@if(session()->get('flash_danger'))
    <x-utils.alert type="danger" class="header-message">
        {{ session()->get('flash_danger') }}
    </x-utils.alert>
@endif

@if(session()->get('toast_success'))
    <span class="toast-alert" data-type="success" style="visibility: hidden;">
        {{ session()->get('toast_success') }}
    </span>
@endif

@if(session()->get('toast_warning'))
<span class="toast-alert" data-type="warning" style="visibility: hidden;">
    {{ session()->get('toast_warning') }}
</span>
@endif

@if(session()->get('toast_info') || session()->get('toast_message'))
<span class="toast-alert" data-type="info" style="visibility: hidden;">
    {{ session()->get('toast_info') }}
</span>
@endif

@if(session()->get('toast_danger'))
<span class="toast-alert" data-type="danger" style="visibility: hidden;">
    {{ session()->get('toast_danger') }}
</span>
@endif

@if(session()->get('status'))
    <x-utils.alert type="success" class="header-message">
        {{ session()->get('status') }}
    </x-utils.alert>
@endif

@if(session()->get('resent'))
    <x-utils.alert type="success" class="header-message">
        @lang('A fresh verification link has been sent to your email address.')
    </x-utils.alert>
@endif

@if(session()->get('verified'))
    <x-utils.alert type="success" class="header-message">
        @lang('Thank you for verifying your e-mail address.')
    </x-utils.alert>
@endif
