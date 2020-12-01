<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSoggettiRelationshipRequest;
use App\Http\Requests\UpdateSoggettiRelationshipRequest;
use App\Http\Resources\Admin\SoggettiRelationshipResource;
use App\Models\SoggettiRelationship;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiRelationshipApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_relationship_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiRelationshipResource(SoggettiRelationship::with(['brand', 'id_dealer'])->get());
    }

    public function store(StoreSoggettiRelationshipRequest $request)
    {
        $soggettiRelationship = SoggettiRelationship::create($request->all());

        return (new SoggettiRelationshipResource($soggettiRelationship))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SoggettiRelationship $soggettiRelationship)
    {
        abort_if(Gate::denies('soggetti_relationship_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiRelationshipResource($soggettiRelationship->load(['brand', 'id_dealer']));
    }

    public function update(UpdateSoggettiRelationshipRequest $request, SoggettiRelationship $soggettiRelationship)
    {
        $soggettiRelationship->update($request->all());

        return (new SoggettiRelationshipResource($soggettiRelationship))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SoggettiRelationship $soggettiRelationship)
    {
        abort_if(Gate::denies('soggetti_relationship_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiRelationship->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
