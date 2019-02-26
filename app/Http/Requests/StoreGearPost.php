<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGearPost extends FormRequest
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
            //
            'name' => 'required|string|max:255',
            'brand_id' => 'required',
            'genre_id' => 'required',           
            'discription' => 'required|max:5000',
            'gear_image' => 'required|mimes:jpg,jpeg,png,gif',
            'site_url' => 'nullable',
        ];
    }
}
