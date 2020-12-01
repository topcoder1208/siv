<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySoggettiRelationshipRequest;
use App\Http\Requests\StoreSoggettiRelationshipRequest;
use App\Http\Requests\UpdateSoggettiRelationshipRequest;
use App\Models\Brand;
use App\Models\Dealer;
use App\Models\SoggettiRelationship;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SoggettiRelationshipController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('soggetti_relationship_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiRelationships = SoggettiRelationship::with(['brand', 'id_dealer'])->get();

        $brands = Brand::get();

        $dealers = Dealer::get();

        return view('admin.soggettiRelationships.index', compact('soggettiRelationships', 'brands', 'dealers'));
    }

    public function create()
    {
        abort_if(Gate::denies('soggetti_relationship_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.soggettiRelationships.create', compact('brands', 'id_dealers'));
    }

    public function store(StoreSoggettiRelationshipRequest $request)
    {
        $soggettiRelationship = SoggettiRelationship::create($request->all());

        return redirect()->route('admin.soggetti-relationships.index');
    }

    public function edit(SoggettiRelationship $soggettiRelationship)
    {
        abort_if(Gate::denies('soggetti_relationship_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_dealers = Dealer::all()->pluck('dealer', 'id')->prepend(trans('global.pleaseSelect'), '');

        $soggettiRelationship->load('brand', 'id_dealer');

        return view('admin.soggettiRelationships.edit', compact('brands', 'id_dealers', 'soggettiRelationship'));
    }

    public function update(UpdateSoggettiRelationshipRequest $request, SoggettiRelationship $soggettiRelationship)
    {
        $soggettiRelationship->update($request->all());

        return redirect()->route('admin.soggetti-relationships.index');
    }

    public function show(SoggettiRelationship $soggettiRelationship)
    {
        abort_if(Gate::denies('soggetti_relationship_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiRelationship->load('brand', 'id_dealer');

        return view('admin.soggettiRelationships.show', compact('soggettiRelationship'));
    }

    public function destroy(SoggettiRelationship $soggettiRelationship)
    {
        abort_if(Gate::denies('soggetti_relationship_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $soggettiRelationship->delete();

        return back();
    }

    public function massDestroy(MassDestroySoggettiRelationshipRequest $request)
    {
        SoggettiRelationship::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
