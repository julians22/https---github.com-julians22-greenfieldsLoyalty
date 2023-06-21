<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'email' => [Rule::requiredIf(function () {
                return config('boilerplate.access.user.change_email');
            }), 'max:255', 'email', Rule::unique('users')->ignore($this->user()->id)],
            "date_of_birth" => ['required', 'date'],
            "child_name" => ['required', 'max:100'],
            "child_date_of_birth" => ['required', 'date'],
            "phone" => ['required', 'numeric',  Rule::unique('users')->ignore($this->user()->id)],
            "province" => ['string', 'required'],
            "city" => ['string', 'required'],
            "district" => ['string'],
            "address" => ['string', 'required', 'max:500'],
            "postal_code" => ['numeric', 'required', 'digits_between:4,10'],
        ];
    }
}
