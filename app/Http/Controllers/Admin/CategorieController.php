<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategorieRequest;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Brand;
use App\Models\Categorie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategorieController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categorie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Categorie::all();

        $brands = Brand::get();

        return view('admin.categories.index', compact('categories', 'brands'));
    }

    public function create()
    {
        abort_if(Gate::denies('categorie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.categories.create', compact('brands'));
    }

    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function edit(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categorie->load('brand');

        return view('admin.categories.edit', compact('brands', 'categorie'));
    }

    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->load('brand', 'categoriaTecnologia', 'brandTipologiaGareInserimentos');

        return view('admin.categories.show', compact('categorie'));
    }

    public function destroy(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategorieRequest $request)
    {
        Categorie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
