<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVenditeRequest;
use App\Http\Requests\UpdateVenditeRequest;
use App\Http\Resources\Admin\VenditeResource;
use App\Models\Vendite;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VenditeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vendite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VenditeResource(Vendite::with(['servizio', 'id_agente', 'id_point'])->get());
    }

    public function store(StoreVenditeRequest $request)
    {
        $vendite = Vendite::create($request->all());

        return (new VenditeResource($vendite))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vendite $vendite)
    {
        abort_if(Gate::denies('vendite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VenditeResource($vendite->load(['servizio', 'id_agente', 'id_point']));
    }

    public function update(UpdateVenditeRequest $request, Vendite $vendite)
    {
        $vendite->update($request->all());

        return (new VenditeResource($vendite))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vendite $vendite)
    {
        abort_if(Gate::denies('vendite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendite->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
