<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Indonesia;
use Propaganistas\LaravelPhone\PhoneNumber;

/**
 * Class RegisterController.
 */
class RegisterController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * RegisterController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Where to redirect users after registration.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route(homeRoute());
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showRegistrationForm(Request $request)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);

        $survey_categories = config('survey.categories');
        $survey_brands = config('survey.brands');
        $survey_packsizes = config('survey.packsizes');

        $provinces = Indonesia::allProvinces();

        $from = $request->get('utm');
        $offline = false;
        if (!empty($from) && $from == 'offline_qr_code') {
            $offline = true;
        }

        return view('frontend.auth.register', compact(
            "survey_categories",
            "survey_brands",
            "survey_packsizes",
            "provinces",
            "offline"
            )
        );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'province' => ['required'],
            'city' => ['required'],
            'district' => ['required'],
            'postal_code' => ['required'],
            'date_of_birth' => ['required', 'date'],
            'history_milk_category' => ['required'],
            'history_milk_product' => ['required'],
            'history_milk_packsize' => ['required'],
            'others_packsize' => ['sometimes'],
            'child_name' => ['sometimes'],
            'child_date_of_birth' => ['sometimes', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
            'password' => ['max:100', Password::min(8)->numbers()->mixedCase(), 'confirmed'],
            'terms' => ['required', 'in:1'],
        ];

        $messages = [
            'email.unique' => ':attribute sudah digunakan'
        ];

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Domains\Auth\Models\User|mixed
     *
     * @throws \App\Domains\Auth\Exceptions\RegisterException
     */
    protected function create(array $data, $offline)
    {
        abort_unless(config('boilerplate.access.user.registration'), 404);
        $data['completed_at'] = now();
        return $this->userService->registerUser($data, $offline);
    }

     /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->withErrors($validator, 'register');
        }

        $phoneField = phone($request->phone, 'ID');

        $validatorPhone = Validator::make([
            'phone_field' => $phoneField->formatE164(),
        ], [
            'phone_field' => 'unique:users,phone'
        ], [
            'phone_field.unique' => 'No Whatsapp sudah di gunakan'
        ]);

        if ($validatorPhone->fails()) {
            return redirect()
                ->back()
                ->withInput($request->except('password'))
                ->withErrors($validatorPhone, 'register');
        }

        $offline = session('offline_user_utm', false);

        event(new Registered($user = $this->create($request->all(), $offline)));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
}
