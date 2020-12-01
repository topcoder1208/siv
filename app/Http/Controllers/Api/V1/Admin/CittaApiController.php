<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCittumRequest;
use App\Http\Requests\UpdateCittumRequest;
use App\Http\Resources\Admin\CittumResource;
use App\Models\Cittum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CittaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cittum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CittumResource(Cittum::with(['provincia'])->get());
    }

    public function store(StoreCittumRequest $request)
    {
        $cittum = Cittum::create($request->all());

        return (new CittumResource($cittum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cittum $cittum)
    {
        abort_if(Gate::denies('cittum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CittumResource($cittum->load(['provincia']));
    }

    public function update(UpdateCittumRequest $request, Cittum $cittum)
    {
        $cittum->update($request->all());

        return (new CittumResource($cittum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cittum $cittum)
    {
        abort_if(Gate::denies('cittum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cittum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
