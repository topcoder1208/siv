<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSoggettiTipologiumRequest;
use App\Http\Requests\UpdateSoggettiTipologiumRequest;
use App\Http\Resources\Admin\SoggettiTipologiumResource;
use App\Models\SoggettiTipologium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiTipologiaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_tipologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiTipologiumResource(SoggettiTipologium::all());
    }

    public function store(StoreSoggettiTipologiumRequest $request)
    {
        $soggettiTipologium = SoggettiTipologium::create($request->all());

        return (new SoggettiTipologiumResource($soggettiTipologium))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SoggettiTipologium $soggettiTipologium)
    {
        abort_if(Gate::denies('soggetti_tipologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiTipologiumResource($soggettiTipologium);
    }

    public function update(UpdateSoggettiTipologiumRequest $request, SoggettiTipologium $soggettiTipologium)
    {
        $soggettiTipologium->update($request->all());

        return (new SoggettiTipologiumResource($soggettiTipologium))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SoggettiTipologium $soggettiTipologium)
    {
        abort_if(Gate::denies('soggetti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiTipologium->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
