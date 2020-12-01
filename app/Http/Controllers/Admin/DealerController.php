<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDealerRequest;
use App\Http\Requests\StoreDealerRequest;
use App\Http\Requests\UpdateDealerRequest;
use App\Models\Cittum;
use App\Models\Dealer;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealers = Dealer::with(['citta', 'provincia'])->get();

        $citta = Cittum::get();

        $provinces = Province::get();

        return view('admin.dealers.index', compact('dealers', 'citta', 'provinces'));
    }

    public function create()
    {
        abort_if(Gate::denies('dealer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dealers.create', compact('cittas', 'provincias'));
    }

    public function store(StoreDealerRequest $request)
    {
        $dealer = Dealer::create($request->all());

        return redirect()->route('admin.dealers.index');
    }

    public function edit(Dealer $dealer)
    {
        abort_if(Gate::denies('dealer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dealer->load('citta', 'provincia');

        return view('admin.dealers.edit', compact('cittas', 'provincias', 'dealer'));
    }

    public function update(UpdateDealerRequest $request, Dealer $dealer)
    {
        $dealer->update($request->all());

        return redirect()->route('admin.dealers.index');
    }

    public function show(Dealer $dealer)
    {
        abort_if(Gate::denies('dealer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealer->load('citta', 'provincia', 'idDealerDealerPoints', 'idDealerSoggettiRelationships', 'idDealerDealerMandatis');

        return view('admin.dealers.show', compact('dealer'));
    }

    public function destroy(Dealer $dealer)
    {
        abort_if(Gate::denies('dealer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealer->delete();

        return back();
    }

    public function massDestroy(MassDestroyDealerRequest $request)
    {
        Dealer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
