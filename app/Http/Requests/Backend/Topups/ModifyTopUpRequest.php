<?php

namespace App\Http\Requests\Backend\Topups;

use Illuminate\Foundation\Http\FormRequest;

class ModifyTopUpRequest extends FormRequest
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
            'update_point' => 'sometimes|numeric|min:0',
            'note' => 'sometimes',
            'receipt_date' => 'required',
            'receipt_number' => 'required',
            'receipt_channel' => 'required',
            'receipt_area' => 'required',
            'receipt_storename' => 'required',
            'details' => 'required|array',
            'details.*.qty' => 'required|numeric|min:1',
            'details.*.price' => 'required|numeric|min:1',
            'details.*.total' => 'required|numeric|min:1'
        ];
    }

    public function attributes()
    {
        return [
            'update_point' => "Update Point"
        ];
    }
}
