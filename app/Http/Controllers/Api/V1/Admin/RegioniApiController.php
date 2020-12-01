<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegioniRequest;
use App\Http\Requests\UpdateRegioniRequest;
use App\Http\Resources\Admin\RegioniResource;
use App\Models\Regioni;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegioniApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('regioni_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegioniResource(Regioni::all());
    }

    public function store(StoreRegioniRequest $request)
    {
        $regioni = Regioni::create($request->all());

        return (new RegioniResource($regioni))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Regioni $regioni)
    {
        abort_if(Gate::denies('regioni_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RegioniResource($regioni);
    }

    public function update(UpdateRegioniRequest $request, Regioni $regioni)
    {
        $regioni->update($request->all());

        return (new RegioniResource($regioni))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Regioni $regioni)
    {
        abort_if(Gate::denies('regioni_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regioni->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
