<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExportlogRequest;
use App\Http\Requests\StoreExportlogRequest;
use App\Http\Requests\UpdateExportlogRequest;
use App\Models\Exportlog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExportlogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('exportlog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exportlogs = Exportlog::all();

        return view('admin.exportlogs.index', compact('exportlogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('exportlog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportlogs.create');
    }

    public function store(StoreExportlogRequest $request)
    {
        $exportlog = Exportlog::create($request->all());

        return redirect()->route('admin.exportlogs.index');
    }

    public function edit(Exportlog $exportlog)
    {
        abort_if(Gate::denies('exportlog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportlogs.edit', compact('exportlog'));
    }

    public function update(UpdateExportlogRequest $request, Exportlog $exportlog)
    {
        $exportlog->update($request->all());

        return redirect()->route('admin.exportlogs.index');
    }

    public function show(Exportlog $exportlog)
    {
        abort_if(Gate::denies('exportlog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.exportlogs.show', compact('exportlog'));
    }

    public function destroy(Exportlog $exportlog)
    {
        abort_if(Gate::denies('exportlog_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exportlog->delete();

        return back();
    }

    public function massDestroy(MassDestroyExportlogRequest $request)
    {
        Exportlog::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
