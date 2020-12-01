<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySoggettiFatturatoRequest;
use App\Http\Requests\StoreSoggettiFatturatoRequest;
use App\Http\Requests\UpdateSoggettiFatturatoRequest;
use App\Models\SoggettiFatturato;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiFatturatoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_fatturato_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiFatturatos = SoggettiFatturato::all();

        return view('admin.soggettiFatturatos.index', compact('soggettiFatturatos'));
    }

    public function create()
    {
        abort_if(Gate::denies('soggetti_fatturato_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiFatturatos.create');
    }

    public function store(StoreSoggettiFatturatoRequest $request)
    {
        $soggettiFatturato = SoggettiFatturato::create($request->all());

        return redirect()->route('admin.soggetti-fatturatos.index');
    }

    public function edit(SoggettiFatturato $soggettiFatturato)
    {
        abort_if(Gate::denies('soggetti_fatturato_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiFatturatos.edit', compact('soggettiFatturato'));
    }

    public function update(UpdateSoggettiFatturatoRequest $request, SoggettiFatturato $soggettiFatturato)
    {
        $soggettiFatturato->update($request->all());

        return redirect()->route('admin.soggetti-fatturatos.index');
    }

    public function show(SoggettiFatturato $soggettiFatturato)
    {
        abort_if(Gate::denies('soggetti_fatturato_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.soggettiFatturatos.show', compact('soggettiFatturato'));
    }

    public function destroy(SoggettiFatturato $soggettiFatturato)
    {
        abort_if(Gate::denies('soggetti_fatturato_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiFatturato->delete();

        return back();
    }

    public function massDestroy(MassDestroySoggettiFatturatoRequest $request)
    {
        SoggettiFatturato::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
