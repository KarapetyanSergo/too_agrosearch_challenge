<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetProductListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit_rows' => 'required',
            'page' => 'required'
        ];
    }
}
