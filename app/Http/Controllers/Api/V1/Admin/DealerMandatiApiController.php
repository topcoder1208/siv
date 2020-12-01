<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDealerMandatiRequest;
use App\Http\Requests\UpdateDealerMandatiRequest;
use App\Http\Resources\Admin\DealerMandatiResource;
use App\Models\DealerMandati;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerMandatiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_mandati_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DealerMandatiResource(DealerMandati::with(['brand', 'id_dealer'])->get());
    }

    public function store(StoreDealerMandatiRequest $request)
    {
        $dealerMandati = DealerMandati::create($request->all());

        return (new DealerMandatiResource($dealerMandati))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DealerMandati $dealerMandati)
    {
        abort_if(Gate::denies('dealer_mandati_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DealerMandatiResource($dealerMandati->load(['brand', 'id_dealer']));
    }

    public function update(UpdateDealerMandatiRequest $request, DealerMandati $dealerMandati)
    {
        $dealerMandati->update($request->all());

        return (new DealerMandatiResource($dealerMandati))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DealerMandati $dealerMandati)
    {
        abort_if(Gate::denies('dealer_mandati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerMandati->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
