<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductionUpdateRequest extends FormRequest
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
        $id = $this->production;
        return [
            'name' => 'string|required|between:5,50|unique:productions,name,'.$id,
            'description_en' => 'string|min:20|max:1000',
            'description_fr' => 'string|min:20|max:1000',
            'imageFile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=640,min_height=400,max_width=1280,max_height=800,ratio=16/10',
            'screenshotFiles.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=640,min_height=400,max_width=1280,max_height=800',
            'type' => 'required|in:website,mobile_app',
            'url' => 'string|max:100',
            'author' => 'string|max:50',
            'new_tags' => ['nullable', 'Regex:/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/'],
        ];
    }
}
