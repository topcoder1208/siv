<?php

namespace App\Http\Requests;

use App\Models\SoggettiRelationship;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySoggettiRelationshipRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('soggetti_relationship_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:soggetti_relationships,id',
        ];
    }
}
