<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfferteRequest;
use App\Http\Requests\UpdateOfferteRequest;
use App\Http\Resources\Admin\OfferteResource;
use App\Models\Offerte;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offerte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferteResource(Offerte::with(['brand', 'tecnologia'])->get());
    }

    public function store(StoreOfferteRequest $request)
    {
        $offerte = Offerte::create($request->all());

        return (new OfferteResource($offerte))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Offerte $offerte)
    {
        abort_if(Gate::denies('offerte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OfferteResource($offerte->load(['brand', 'tecnologia']));
    }

    public function update(UpdateOfferteRequest $request, Offerte $offerte)
    {
        $offerte->update($request->all());

        return (new OfferteResource($offerte))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Offerte $offerte)
    {
        abort_if(Gate::denies('offerte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerte->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
