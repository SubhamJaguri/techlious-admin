<?php

namespace App\Http\Requests;

use App\Agent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAgentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:agents,id',
        ];
    }
}
