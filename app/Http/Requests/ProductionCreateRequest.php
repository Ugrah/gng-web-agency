<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionCreateRequest extends FormRequest
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
        $rules = [
            'name' => 'string|required|between:5,50|unique:productions',
            'descriptionEn' => 'string|max:255',
            'descriptionFr' => 'string|max:255',
            'imageFile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type' => 'required|in:website,mobileApp',
            'url' => 'string|max:100',
            'author' => 'string|max:50',
            'tags' => ['Regex:/^[A-Za-z0-9-éèàù]{0,50}?(,[A-Za-z0-9-éèàù]{0,50})*$/'],
        ];
        $images = count(request()->images);
        foreach(range(0, $images) as $index) {
            $rules['images.' . $index] = 'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

        return $rules;
    }
}
