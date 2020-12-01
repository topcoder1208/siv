<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySoggettiTipologiumRequest;
use App\Http\Requests\StoreSoggettiTipologiumRequest;
use App\Http\Requests\UpdateSoggettiTipologiumRequest;
use App\Models\SoggettiTipologium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiTipologiaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_tipologium_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiTipologia = SoggettiTipologium::all();

        return view('admin.soggettiTipologia.index', compact('soggettiTipologia'));
    }

    public function create()
    {
        abort_if(Gate::denies('soggetti_tipologium_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiTipologia.create');
    }

    public function store(StoreSoggettiTipologiumRequest $request)
    {
        $soggettiTipologium = SoggettiTipologium::create($request->all());

        return redirect()->route('admin.soggetti-tipologia.index');
    }

    public function edit(SoggettiTipologium $soggettiTipologium)
    {
        abort_if(Gate::denies('soggetti_tipologium_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiTipologia.edit', compact('soggettiTipologium'));
    }

    public function update(UpdateSoggettiTipologiumRequest $request, SoggettiTipologium $soggettiTipologium)
    {
        $soggettiTipologium->update($request->all());

        return redirect()->route('admin.soggetti-tipologia.index');
    }

    public function show(SoggettiTipologium $soggettiTipologium)
    {
        abort_if(Gate::denies('soggetti_tipologium_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiTipologia.show', compact('soggettiTipologium'));
    }

    public function destroy(SoggettiTipologium $soggettiTipologium)
    {
        abort_if(Gate::denies('soggetti_tipologium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiTipologium->delete();

        return back();
    }

    public function massDestroy(MassDestroySoggettiTipologiumRequest $request)
    {
        SoggettiTipologium::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
