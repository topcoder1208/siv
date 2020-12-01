<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTecnologiumRequest;
use App\Http\Requests\UpdateTecnologiumRequest;
use App\Http\Resources\Admin\TecnologiumResource;
use App\Models\Tecnologium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TecnologiaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tecnologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TecnologiumResource(Tecnologium::with(['categoria'])->get());
    }

    public function store(StoreTecnologiumRequest $request)
    {
        $tecnologium = Tecnologium::create($request->all());

        return (new TecnologiumResource($tecnologium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Tecnologium $tecnologium)
    {
        abort_if(Gate::denies('tecnologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TecnologiumResource($tecnologium->load(['categoria']));
    }

    public function update(UpdateTecnologiumRequest $request, Tecnologium $tecnologium)
    {
        $tecnologium->update($request->all());

        return (new TecnologiumResource($tecnologium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tecnologium $tecnologium)
    {
        abort_if(Gate::denies('tecnologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tecnologium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
