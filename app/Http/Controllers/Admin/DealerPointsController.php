<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDealerPointRequest;
use App\Http\Requests\StoreDealerPointRequest;
use App\Http\Requests\UpdateDealerPointRequest;
use App\Models\Cittum;
use App\Models\Dealer;
use App\Models\DealerPoint;
use App\Models\Province;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerPointsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerPoints = DealerPoint::with(['id_dealer', 'citta', 'provincia'])->get();

        $dealers = Dealer::get();

        $citta = Cittum::get();

        $provinces = Province::get();

        return view('admin.dealerPoints.index', compact('dealerPoints', 'dealers', 'citta', 'provinces'));
    }

    public function create()
    {
        abort_if(Gate::denies('dealer_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dealerPoints.create', compact('id_dealers', 'cittas', 'provincias'));
    }

    public function store(StoreDealerPointRequest $request)
    {
        $dealerPoint = DealerPoint::create($request->all());

        return redirect()->route('admin.dealer-points.index');
    }

    public function edit(DealerPoint $dealerPoint)
    {
        abort_if(Gate::denies('dealer_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cittas = Cittum::all()->pluck('citta', 'id')->prepend(trans('global.pleaseSelect'), '');

        $provincias = Province::all()->pluck('provincia', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dealerPoint->load('id_dealer', 'citta', 'provincia');

        return view('admin.dealerPoints.edit', compact('id_dealers', 'cittas', 'provincias', 'dealerPoint'));
    }

    public function update(UpdateDealerPointRequest $request, DealerPoint $dealerPoint)
    {
        $dealerPoint->update($request->all());

        return redirect()->route('admin.dealer-points.index');
    }

    public function show(DealerPoint $dealerPoint)
    {
        abort_if(Gate::denies('dealer_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerPoint->load('id_dealer', 'citta', 'provincia', 'idPointVendites');

        return view('admin.dealerPoints.show', compact('dealerPoint'));
    }

    public function destroy(DealerPoint $dealerPoint)
    {
        abort_if(Gate::denies('dealer_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerPoint->delete();

        return back();
    }

    public function massDestroy(MassDestroyDealerPointRequest $request)
    {
        DealerPoint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
