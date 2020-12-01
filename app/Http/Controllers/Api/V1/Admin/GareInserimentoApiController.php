<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGareInserimentoRequest;
use App\Http\Requests\UpdateGareInserimentoRequest;
use App\Http\Resources\Admin\GareInserimentoResource;
use App\Models\GareInserimento;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GareInserimentoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gare_inserimento_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GareInserimentoResource(GareInserimento::with(['brand_tipologias', 'visibilitas', 'esito_negativos'])->get());
    }

    public function store(StoreGareInserimentoRequest $request)
    {
        $gareInserimento = GareInserimento::create($request->all());
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return (new GareInserimentoResource($gareInserimento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GareInserimento $gareInserimento)
    {
        abort_if(Gate::denies('gare_inserimento_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GareInserimentoResource($gareInserimento->load(['brand_tipologias', 'visibilitas', 'esito_negativos']));
    }

    public function update(UpdateGareInserimentoRequest $request, GareInserimento $gareInserimento)
    {
        $gareInserimento->update($request->all());
        $gareInserimento->brand_tipologias()->sync($request->input('brand_tipologias', []));
        $gareInserimento->visibilitas()->sync($request->input('visibilitas', []));
        $gareInserimento->esito_negativos()->sync($request->input('esito_negativos', []));

        return (new GareInserimentoResource($gareInserimento))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GareInserimento $gareInserimento)
    {
        abort_if(Gate::denies('gare_inserimento_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gareInserimento->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
