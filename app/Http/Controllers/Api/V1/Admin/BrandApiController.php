<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\Admin\BrandResource;
use App\Models\Brand;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BrandApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('brand_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrandResource(Brand::all());
    }

    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->all());

        if ($request->input('logo', false)) {
            $brand->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
        }

        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Brand $brand)
    {
        abort_if(Gate::denies('brand_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BrandResource($brand);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        if ($request->input('logo', false)) {
            if (!$brand->logo || $request->input('logo') !== $brand->logo->file_name) {
                if ($brand->logo) {
                    $brand->logo->delete();
                }

                $brand->addMedia(storage_path('tmp/uploads/' . $request->input('logo')))->toMediaCollection('logo');
            }
        } elseif ($brand->logo) {
            $brand->logo->delete();
        }

        return (new BrandResource($brand))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Brand $brand)
    {
        abort_if(Gate::denies('brand_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brand->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}