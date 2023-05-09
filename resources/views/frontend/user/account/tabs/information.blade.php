<x-forms.patch :action="route('frontend.user.profile.update')">
    <div class="row">

        <div class="col-md-6"> <!-- col-md-6 || first column -->
            <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label">@lang('Name')</label>

                <div class="col-md-9">
                    <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name" />
                </div>
            </div><!--form-group-->

            @if ($logged_in_user->canChangeEmail())
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">@lang('E-mail Address')</label>

                    <div class="col-md-9">
                        <x-utils.alert type="info" class="mb-3" :dismissable="false">
                            <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                        </x-utils.alert>

                        <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" />
                    </div>
                </div><!--form-group-->
            @endif

            <div class="form-group row">
                <label for="dob" class="col-md-3 col-form-label">@lang('Birth Date')</label>

                <div class="col-md-9">
                    <input type="date" name="dob" class="form-control" placeholder="{{ __('Birth Date') }}" value="{{ old('dob') ?? ($logged_in_user->date_of_birth ?? null) }}" required />
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="phone" class="col-md-3 col-form-label">@lang('Phone Number')</label>

                <div class="col-md-9">
                    <input type="text" name="phone" class="form-control" placeholder="{{ __('Phone Number') }}" value="{{ old('phone') ?? $logged_in_user->phone }}" required />
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="province" class="col-md-3 col-form-label">@lang('Province')</label>

                <div class="col-md-9">
                    <input type="text" name="province" class="form-control" placeholder="{{ __('Province') }}" value="{{ old('province') ?? $logged_in_user->province }}" required />
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="city" class="col-md-3 col-form-label">@lang('City')</label>

                <div class="col-md-9">
                    <input type="text" name="city" class="form-control" placeholder="{{ __('City') }}" value="{{ old('city') ?? $logged_in_user->city }}" required />
                </div>
            </div><!--form-group-->

        </div> <!-- col-md-6 || first column -->

        <div class="col-md-6"> <!-- col-md-6 || second column -->
            <div class="form-group row">
                <label for="child_name" class="col-md-3 col-form-label">@lang('Child Name')</label>

                <div class="col-md-9">
                    <input type="text" name="child_name" class="form-control" placeholder="{{ __('Child Name') }}" value="{{ old('child_name') ?? $logged_in_user->child_name }}" required />
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="child_dob" class="col-md-3 col-form-label">@lang('Child Birth Date')</label>

                <div class="col-md-9">
                    <input type="date" name="child_dob" class="form-control" placeholder="{{ __('Child Birth Date') }}" value="{{ old('child_dob') ?? $logged_in_user->child_date_of_birth }}" required />
                </div>
            </div><!--form-group-->

            <div class="form-group row">
                <label for="address" class="col-md-3 col-form-label">@lang('Address')</label>

                <div class="col-md-9">
                    <textarea name="address" id="address" rows="4" class="form-control" placeholder="{{ __('Address') }}" required>{{ old('address') ?? $logged_in_user->address }}</textarea>
                </div>
            </div> <!--form-group-->

            <div class="form-group row">
                <label for="postal_code" class="col-md-3 col-form-label">@lang('Postal Code')</label>

                <div class="col-md-9">
                    <input type="text" name="postal_code" class="form-control" placeholder="{{ __('Postal Code') }}" value="{{ old('postal_code') ?? $logged_in_user->postal_code }}" required />
                </div>
            </div><!--form-group-->

        </div> <!-- col-md-6 || second column -->


    </div>

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
