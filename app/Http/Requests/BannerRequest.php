<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
                'ban_title' => 'required',
                'ban_description' => 'required',
                'ban_image' => 'mimes:jpg,png,jpeg,gif',
                'ban_link' => 'required',
                //'ban_status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'ban_title.required' => 'Please input Title of Banner!',
            //'ban_title.unique' => 'Banner dupplicate title!',
            'ban_description.required' => 'Please input Description of Banner!',
            'ban_link.required' => 'Please input Categories of Banner!',
            //'ban_status.required' => 'Please input Status of Banner!',
            //'ban_image.required'  => 'Please input Image of Banner!',
            'ban_image.mimes' => 'Accept image type: jpg, png, jpeg, gif!',
        ];
    }
}
