<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOfferteRequest;
use App\Http\Requests\StoreOfferteRequest;
use App\Http\Requests\UpdateOfferteRequest;
use App\Models\Brand;
use App\Models\Offerte;
use App\Models\Tecnologium;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OfferteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('offerte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offertes = Offerte::with(['brand', 'tecnologia'])->get();

        $brands = Brand::get();

        $tecnologia = Tecnologium::get();

        return view('admin.offertes.index', compact('offertes', 'brands', 'tecnologia'));
    }

    public function create()
    {
        abort_if(Gate::denies('offerte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tecnologias = Tecnologium::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.offertes.create', compact('brands', 'tecnologias'));
    }

    public function store(StoreOfferteRequest $request)
    {
        $offerte = Offerte::create($request->all());

        return redirect()->route('admin.offertes.index');
    }

    public function edit(Offerte $offerte)
    {
        abort_if(Gate::denies('offerte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tecnologias = Tecnologium::all()->pluck('nome', 'id')->prepend(trans('global.pleaseSelect'), '');

        $offerte->load('brand', 'tecnologia');

        return view('admin.offertes.edit', compact('brands', 'tecnologias', 'offerte'));
    }

    public function update(UpdateOfferteRequest $request, Offerte $offerte)
    {
        $offerte->update($request->all());

        return redirect()->route('admin.offertes.index');
    }

    public function show(Offerte $offerte)
    {
        abort_if(Gate::denies('offerte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerte->load('brand', 'tecnologia');

        return view('admin.offertes.show', compact('offerte'));
    }

    public function destroy(Offerte $offerte)
    {
        abort_if(Gate::denies('offerte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $offerte->delete();

        return back();
    }

    public function massDestroy(MassDestroyOfferteRequest $request)
    {
        Offerte::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
