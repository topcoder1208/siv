<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInserimentoSoglieRangeRequest;
use App\Http\Requests\UpdateInserimentoSoglieRangeRequest;
use App\Http\Resources\Admin\InserimentoSoglieRangeResource;
use App\Models\InserimentoSoglieRange;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InserimentoSoglieRangeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inserimento_soglie_range_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InserimentoSoglieRangeResource(InserimentoSoglieRange::with(['gara'])->get());
    }

    public function store(StoreInserimentoSoglieRangeRequest $request)
    {
        $inserimentoSoglieRange = InserimentoSoglieRange::create($request->all());

        return (new InserimentoSoglieRangeResource($inserimentoSoglieRange))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(InserimentoSoglieRange $inserimentoSoglieRange)
    {
        abort_if(Gate::denies('inserimento_soglie_range_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InserimentoSoglieRangeResource($inserimentoSoglieRange->load(['gara']));
    }

    public function update(UpdateInserimentoSoglieRangeRequest $request, InserimentoSoglieRange $inserimentoSoglieRange)
    {
        $inserimentoSoglieRange->update($request->all());

        return (new InserimentoSoglieRangeResource($inserimentoSoglieRange))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(InserimentoSoglieRange $inserimentoSoglieRange)
    {
        abort_if(Gate::denies('inserimento_soglie_range_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoSoglieRange->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
