<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnquiryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return [
            'listing_id' => ['required', 'exists:listings,id'],
            'name'       => ['required', 'string', 'max:100'],
            'email'      => ['required', 'email'],
            'message'    => ['required', 'string', 'min:10'],
        ];
    }
}
