<?php

namespace App\Http\Requests\Admin\Manager;

use Illuminate\Foundation\Http\FormRequest;

class UpdateManagerRequest extends FormRequest
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
        $manager = $this->route('manager');
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'skype' => 'required|string|max:255',
            'country_id' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $manager->id,
            'status' => 'required|string',
        ];
    }
}
