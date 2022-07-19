<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'default_address'   => 'nullable',
                    'address_title'     => 'required',
                    'first_name'        => 'required',
                    'last_name'         => 'required',
                    'email'             => 'required|email',
                    'mobile'            => 'required|numeric',
                    'address'           => 'required',
                    'address2'          => 'required',
                    'country_id'        => 'required',
                    'state_id'          => 'required',
                    'city_id'           => 'required',
                    'zip_code'          => 'required',
                    'po_box'            => 'required',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'address_title'    => ['required', 'string', 'max:255'],
                    'default_address'  => ['nullable'],
                    'first_name'       => ['required', 'string', 'max:255'],
                    'last_name'        => ['required', 'string', 'max:255'],
                    'email'            => ['required', 'string', 'email', 'unique:user_addresses,email,'.auth()->id()],
                    'mobile'           => ['required', 'numeric', 'unique:user_addresses,email,'.auth()->id()],
                    'address'          => ['required', 'string', 'max:255'],
                    'address2'         => ['required', 'string', 'max:255'],
                    'country_id'       => ['required', 'string', 'max:255'],
                    'state_id'         => ['required', 'string', 'max:255'],
                    'city_id'          => ['required', 'string', 'max:255'],
                    'zip_code'         => ['required', 'string', 'max:255'],
                    'po_box'           => ['required', 'string', 'max:255'],
                ];
            }
            default: break;
        }
    }
}
