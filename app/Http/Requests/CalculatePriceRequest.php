<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatePriceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tax_number' => 'required|string',
        ];
    }
}
