<?php

namespace App\Http\Requests;

use App\Models\Offerte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyOfferteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('offerte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:offertes,id',
        ];
    }
}
