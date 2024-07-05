<?php

namespace App\Http\Requests\Admin\Offer;

use Illuminate\Foundation\Http\FormRequest;

class CreateOfferRequest extends FormRequest
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
            'advertiser_id'=>'required|exists:advertisers,id',
            'category_id'=>'required|exists:categories,id',
            'name'=>'required|max:255',
            'preview'=>'required|max:255',
            'tracking_url'=>'required|max:255',
            'revenue'=>'required',
            'payout'=>'required',
            'country_id'=>'required|exists:countries,id',
            'device_id'=>'required|exists:countries,id',
            'manager_commission'=>'required',
            'refer_comission'=>'required',
            'alt_offer_id'=>'sometimes|exists:offers,id',
            'expiration_date'=>'sometimes|date',
            'avater' => 'nullable|image|accepted_mimes:jpeg,bmp,png,gif,svg',
        ];
    }
}
