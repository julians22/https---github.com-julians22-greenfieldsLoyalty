<div class="form-group">
    <x-utils.link
        :href="route('frontend.auth.social.login', 'facebook')"
        class="btn btn-block btn-blue btn-login btn-rounded d-none"
        icon="fab fa-facebook"
        :text="__('Login with Facebook')"
        :hide="!config('services.facebook.active')" />
</div>

<div class="form-group">
    <x-utils.link
        :href="route('frontend.auth.social.login', 'google')"
        class="btn btn-block btn-outline-dark btn-login btn-rounded"
        icon="fab fa-google"
        :text="__('Login with Google')"
        :hide="!config('services.google.active')" />
</div>
