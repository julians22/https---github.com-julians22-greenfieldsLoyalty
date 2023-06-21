<?php

namespace App\Http\Requests\Backend\Rewards;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRewardRequest extends FormRequest
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
            "name" => 'required|max:200',
            "description" => 'sometimes',
            "point" => 'numeric',
            "image" => 'required',
            "status" => 'sometimes',
            "initial_stock" => 'required|numeric'
        ];
    }
}
