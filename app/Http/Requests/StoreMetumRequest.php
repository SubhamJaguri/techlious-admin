<?php

namespace App\Http\Requests;

use App\Metum;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreMetumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('metum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'object' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'key'    => [
                'required',
            ],
            'value'  => [
                'required',
            ],
        ];
    }
}
