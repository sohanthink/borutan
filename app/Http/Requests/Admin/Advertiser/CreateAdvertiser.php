<?php

namespace App\Http\Requests\Admin\Advertiser;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdvertiser extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:advertisers',
            'parameter' => 'required|string|max:255',
        ];
    }
}
