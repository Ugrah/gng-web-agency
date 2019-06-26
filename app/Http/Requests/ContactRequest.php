<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
			'name' => 'string|required|between:5,50',
            'email' => 'email|required',
            'phoneNumber' => 'numeric|phone',
			'subject' => 'string|required|between:5,50',            
			'content' => 'string|required|max:255',
		];
    }
}
