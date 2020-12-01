<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInserimentoSoglieRangeRequest;
use App\Http\Requests\StoreInserimentoSoglieRangeRequest;
use App\Http\Requests\UpdateInserimentoSoglieRangeRequest;
use App\Models\GareInserimento;
use App\Models\InserimentoSoglieRange;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InserimentoSoglieRangeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inserimento_soglie_range_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoSoglieRanges = InserimentoSoglieRange::all();

        return view('admin.inserimentoSoglieRanges.index', compact('inserimentoSoglieRanges'));
    }

    public function create()
    {
        abort_if(Gate::denies('inserimento_soglie_range_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $garas = GareInserimento::all()->pluck('titolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.inserimentoSoglieRanges.create', compact('garas'));
    }

    public function store(StoreInserimentoSoglieRangeRequest $request)
    {
        $inserimentoSoglieRange = InserimentoSoglieRange::create($request->all());

        return redirect()->route('admin.inserimento-soglie-ranges.index');
    }

    public function edit(InserimentoSoglieRange $inserimentoSoglieRange)
    {
        abort_if(Gate::denies('inserimento_soglie_range_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $garas = GareInserimento::all()->pluck('titolo', 'id')->prepend(trans('global.pleaseSelect'), '');

        $inserimentoSoglieRange->load('gara');

        return view('admin.inserimentoSoglieRanges.edit', compact('garas', 'inserimentoSoglieRange'));
    }

    public function update(UpdateInserimentoSoglieRangeRequest $request, InserimentoSoglieRange $inserimentoSoglieRange)
    {
        $inserimentoSoglieRange->update($request->all());

        return redirect()->route('admin.inserimento-soglie-ranges.index');
    }

    public function show(InserimentoSoglieRange $inserimentoSoglieRange)
    {
        abort_if(Gate::denies('inserimento_soglie_range_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoSoglieRange->load('gara');

        return view('admin.inserimentoSoglieRanges.show', compact('inserimentoSoglieRange'));
    }

    public function destroy(InserimentoSoglieRange $inserimentoSoglieRange)
    {
        abort_if(Gate::denies('inserimento_soglie_range_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inserimentoSoglieRange->delete();

        return back();
    }

    public function massDestroy(MassDestroyInserimentoSoglieRangeRequest $request)
    {
        InserimentoSoglieRange::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
