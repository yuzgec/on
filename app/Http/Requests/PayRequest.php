<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
  
    public function rules()
    {
        return [
            'name'                      => 'required',
            'surname'                   => 'required',
            'tckn'                      => 'required|min:11|numeric',
            'email'                     => 'required|email',
            'phone'                     => 'required|numeric',
            'address'                   => 'required',
            'province'                  => 'required',
            'city'                      => 'required',

        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Zorunlu alan giriniz',
            'surname.required'          => 'Zorunlu alan giriniz',
            'tckn.required'             => 'Zorunlu alan giriniz',
            'tckn.min'                  => 'T.C No 11 Karakterden oluşmalıdır',
            'tckn.numeric'              => 'T.C No sadece rakamlardan oluşmalıdır',
            'email.required'            => 'Zorunlu alan giriniz',
            'email.email'               => 'Geçerli bir email adresi giriniz',
            'phone.required'            => 'Zorunlu alan giriniz',
            'phone.numeric'              => 'Örn:5551234567',
            'surname.required'          => 'Zorunlu alan giriniz',

            'province.required'         => 'Zorunlu alan giriniz',
            'city.required'             => 'Zorunlu alan giriniz',
            'address.required'          => 'Zorunlu alan giriniz',

        ];
    }
}
