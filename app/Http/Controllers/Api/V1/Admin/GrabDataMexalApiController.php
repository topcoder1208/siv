<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGrabDataMexalRequest;
use App\Http\Requests\UpdateGrabDataMexalRequest;
use App\Http\Resources\Admin\GrabDataMexalResource;
use App\Models\GrabDataMexal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrabDataMexalApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grab_data_mexal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrabDataMexalResource(GrabDataMexal::all());
    }

    public function store(StoreGrabDataMexalRequest $request)
    {
        $grabDataMexal = GrabDataMexal::create($request->all());

        return (new GrabDataMexalResource($grabDataMexal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GrabDataMexal $grabDataMexal)
    {
        abort_if(Gate::denies('grab_data_mexal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GrabDataMexalResource($grabDataMexal);
    }

    public function update(UpdateGrabDataMexalRequest $request, GrabDataMexal $grabDataMexal)
    {
        $grabDataMexal->update($request->all());

        return (new GrabDataMexalResource($grabDataMexal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GrabDataMexal $grabDataMexal)
    {
        abort_if(Gate::denies('grab_data_mexal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grabDataMexal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
