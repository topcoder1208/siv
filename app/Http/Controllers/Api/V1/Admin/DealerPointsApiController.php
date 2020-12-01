<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealerPointRequest;
use App\Http\Requests\UpdateDealerPointRequest;
use App\Http\Resources\Admin\DealerPointResource;
use App\Models\DealerPoint;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerPointsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DealerPointResource(DealerPoint::with(['id_dealer', 'citta', 'provincia'])->get());
    }

    public function store(StoreDealerPointRequest $request)
    {
        $dealerPoint = DealerPoint::create($request->all());

        return (new DealerPointResource($dealerPoint))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DealerPoint $dealerPoint)
    {
        abort_if(Gate::denies('dealer_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DealerPointResource($dealerPoint->load(['id_dealer', 'citta', 'provincia']));
    }

    public function update(UpdateDealerPointRequest $request, DealerPoint $dealerPoint)
    {
        $dealerPoint->update($request->all());

        return (new DealerPointResource($dealerPoint))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DealerPoint $dealerPoint)
    {
        abort_if(Gate::denies('dealer_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerPoint->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
