<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgentiRequest;
use App\Http\Requests\UpdateAgentiRequest;
use App\Http\Resources\Admin\AgentiResource;
use App\Models\Agenti;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agenti_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentiResource(Agenti::with(['id_brand', 'citta', 'provincia'])->get());
    }

    public function store(StoreAgentiRequest $request)
    {
        $agenti = Agenti::create($request->all());

        return (new AgentiResource($agenti))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agenti $agenti)
    {
        abort_if(Gate::denies('agenti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgentiResource($agenti->load(['id_brand', 'citta', 'provincia']));
    }

    public function update(UpdateAgentiRequest $request, Agenti $agenti)
    {
        $agenti->update($request->all());

        return (new AgentiResource($agenti))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agenti $agenti)
    {
        abort_if(Gate::denies('agenti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenti->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
