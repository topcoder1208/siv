<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExportlogRequest;
use App\Http\Requests\UpdateExportlogRequest;
use App\Http\Resources\Admin\ExportlogResource;
use App\Models\Exportlog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExportlogApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exportlog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExportlogResource(Exportlog::all());
    }

    public function store(StoreExportlogRequest $request)
    {
        $exportlog = Exportlog::create($request->all());

        return (new ExportlogResource($exportlog))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Exportlog $exportlog)
    {
        abort_if(Gate::denies('exportlog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ExportlogResource($exportlog);
    }

    public function update(UpdateExportlogRequest $request, Exportlog $exportlog)
    {
        $exportlog->update($request->all());

        return (new ExportlogResource($exportlog))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Exportlog $exportlog)
    {
        abort_if(Gate::denies('exportlog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exportlog->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
