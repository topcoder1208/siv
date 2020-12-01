<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserParameterRequest;
use App\Http\Requests\UpdateUserParameterRequest;
use App\Http\Resources\Admin\UserParameterResource;
use App\Models\UserParameter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserParametersApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_parameter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserParameterResource(UserParameter::all());
    }

    public function store(StoreUserParameterRequest $request)
    {
        $userParameter = UserParameter::create($request->all());

        return (new UserParameterResource($userParameter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(UserParameter $userParameter)
    {
        abort_if(Gate::denies('user_parameter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UserParameterResource($userParameter);
    }

    public function update(UpdateUserParameterRequest $request, UserParameter $userParameter)
    {
        $userParameter->update($request->all());

        return (new UserParameterResource($userParameter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UserParameter $userParameter)
    {
        abort_if(Gate::denies('user_parameter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userParameter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
