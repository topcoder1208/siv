<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSoggettiFatturatoRequest;
use App\Http\Requests\UpdateSoggettiFatturatoRequest;
use App\Http\Resources\Admin\SoggettiFatturatoResource;
use App\Models\SoggettiFatturato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiFatturatoApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_fatturato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiFatturatoResource(SoggettiFatturato::all());
    }

    public function store(StoreSoggettiFatturatoRequest $request)
    {
        $soggettiFatturato = SoggettiFatturato::create($request->all());

        return (new SoggettiFatturatoResource($soggettiFatturato))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SoggettiFatturato $soggettiFatturato)
    {
        abort_if(Gate::denies('soggetti_fatturato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SoggettiFatturatoResource($soggettiFatturato);
    }

    public function update(UpdateSoggettiFatturatoRequest $request, SoggettiFatturato $soggettiFatturato)
    {
        $soggettiFatturato->update($request->all());

        return (new SoggettiFatturatoResource($soggettiFatturato))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SoggettiFatturato $soggettiFatturato)
    {
        abort_if(Gate::denies('soggetti_fatturato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiFatturato->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
