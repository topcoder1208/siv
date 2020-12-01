<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInserimentoGareSoglieRequest;
use App\Http\Requests\UpdateInserimentoGareSoglieRequest;
use App\Http\Resources\Admin\InserimentoGareSoglieResource;
use App\Models\InserimentoGareSoglie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InserimentoGareSoglieApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inserimento_gare_soglie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InserimentoGareSoglieResource(InserimentoGareSoglie::with(['titolo'])->get());
    }

    public function store(StoreInserimentoGareSoglieRequest $request)
    {
        $inserimentoGareSoglie = InserimentoGareSoglie::create($request->all());

        return (new InserimentoGareSoglieResource($inserimentoGareSoglie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InserimentoGareSoglie $inserimentoGareSoglie)
    {
        abort_if(Gate::denies('inserimento_gare_soglie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InserimentoGareSoglieResource($inserimentoGareSoglie->load(['titolo']));
    }

    public function update(UpdateInserimentoGareSoglieRequest $request, InserimentoGareSoglie $inserimentoGareSoglie)
    {
        $inserimentoGareSoglie->update($request->all());

        return (new InserimentoGareSoglieResource($inserimentoGareSoglie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InserimentoGareSoglie $inserimentoGareSoglie)
    {
        abort_if(Gate::denies('inserimento_gare_soglie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoGareSoglie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
