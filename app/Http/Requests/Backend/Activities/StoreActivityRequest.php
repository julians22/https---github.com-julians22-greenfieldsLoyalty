<?php

namespace App\Http\Requests\Backend\Activities;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityRequest extends FormRequest
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
            'title' => 'required|max:100',
            'excerpt' => 'required',
            'thumbnail_image' => 'required',
            'content' => 'required',
            'start_date' => 'date',
            'end_date' => 'date'
        ];
    }
}
