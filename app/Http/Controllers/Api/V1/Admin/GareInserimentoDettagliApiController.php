<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGareInserimentoDettagliRequest;
use App\Http\Requests\UpdateGareInserimentoDettagliRequest;
use App\Http\Resources\Admin\GareInserimentoDettagliResource;
use App\Models\GareInserimentoDettagli;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GareInserimentoDettagliApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GareInserimentoDettagliResource(GareInserimentoDettagli::with(['gara_inserimento'])->get());
    }

    public function store(StoreGareInserimentoDettagliRequest $request)
    {
        $gareInserimentoDettagli = GareInserimentoDettagli::create($request->all());

        return (new GareInserimentoDettagliResource($gareInserimentoDettagli))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GareInserimentoDettagli $gareInserimentoDettagli)
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GareInserimentoDettagliResource($gareInserimentoDettagli->load(['gara_inserimento']));
    }

    public function update(UpdateGareInserimentoDettagliRequest $request, GareInserimentoDettagli $gareInserimentoDettagli)
    {
        $gareInserimentoDettagli->update($request->all());

        return (new GareInserimentoDettagliResource($gareInserimentoDettagli))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GareInserimentoDettagli $gareInserimentoDettagli)
    {
        abort_if(Gate::denies('gare_inserimento_dettagli_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimentoDettagli->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
