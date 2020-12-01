<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Http\Resources\Admin\CategorieResource;
use App\Models\Categorie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategorieApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('categorie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategorieResource(Categorie::with(['brand'])->get());
    }

    public function store(StoreCategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());

        return (new CategorieResource($categorie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategorieResource($categorie->load(['brand']));
    }

    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());

        return (new CategorieResource($categorie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Categorie $categorie)
    {
        abort_if(Gate::denies('categorie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
