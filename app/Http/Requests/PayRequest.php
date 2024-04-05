<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PayRequest extends FormRequest
{
  
    public function rules()
    {
        return [
            'firstname'                 => 'required',
            'surname'                   => 'required',
            'tckn'                      => 'required|min:11|numeric',
            'email'                     => 'required|email',
            'phone'                     => 'required',
            'address'                   => 'required',
            'province'                  => 'required',
            'city'                      => 'required',

        ];
    }

    public function messages()
    {
        return [
            'firstname.required'        => 'Zorunlu alan giriniz',
            'surname.required'          => 'Zorunlu alan giriniz',
            'tckn.required'             => 'Zorunlu alan giriniz',
            'tckn.min'                  => 'T.C No 11 Karakterden oluşmalıdır',
            'tckn.numeric'              => 'T.C No ssadece rakamlardan oluşmalıdır',
            'email.required'            => 'Zorunlu alan giriniz',
            'email.email'               => 'Geçerli bir email adresi giriniz',
            'phone.required'            => 'Zorunlu alan giriniz',
            'surname.required'          => 'Zorunlu alan giriniz',

            'province.required'         => 'Zorunlu alan giriniz',
            'city.required'             => 'Zorunlu alan giriniz',
            'address.required'          => 'Zorunlu alan giriniz',

        ];
    }
}
