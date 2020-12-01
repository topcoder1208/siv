<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDealerMandatiRequest;
use App\Http\Requests\StoreDealerMandatiRequest;
use App\Http\Requests\UpdateDealerMandatiRequest;
use App\Models\Brand;
use App\Models\Dealer;
use App\Models\DealerMandati;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DealerMandatiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dealer_mandati_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerMandatis = DealerMandati::with(['brand', 'id_dealer'])->get();

        $brands = Brand::get();

        $dealers = Dealer::get();

        return view('admin.dealerMandatis.index', compact('dealerMandatis', 'brands', 'dealers'));
    }

    public function create()
    {
        abort_if(Gate::denies('dealer_mandati_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dealerMandatis.create', compact('brands', 'id_dealers'));
    }

    public function store(StoreDealerMandatiRequest $request)
    {
        $dealerMandati = DealerMandati::create($request->all());

        return redirect()->route('admin.dealer-mandatis.index');
    }

    public function edit(DealerMandati $dealerMandati)
    {
        abort_if(Gate::denies('dealer_mandati_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dealerMandati->load('brand', 'id_dealer');

        return view('admin.dealerMandatis.edit', compact('brands', 'id_dealers', 'dealerMandati'));
    }

    public function update(UpdateDealerMandatiRequest $request, DealerMandati $dealerMandati)
    {
        $dealerMandati->update($request->all());

        return redirect()->route('admin.dealer-mandatis.index');
    }

    public function show(DealerMandati $dealerMandati)
    {
        abort_if(Gate::denies('dealer_mandati_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerMandati->load('brand', 'id_dealer');

        return view('admin.dealerMandatis.show', compact('dealerMandati'));
    }

    public function destroy(DealerMandati $dealerMandati)
    {
        abort_if(Gate::denies('dealer_mandati_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dealerMandati->delete();

        return back();
    }

    public function massDestroy(MassDestroyDealerMandatiRequest $request)
    {
        DealerMandati::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
