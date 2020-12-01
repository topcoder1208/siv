<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserParameterRequest;
use App\Http\Requests\StoreUserParameterRequest;
use App\Http\Requests\UpdateUserParameterRequest;
use App\Models\UserParameter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserParametersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('user_parameter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userParameters = UserParameter::all();

        return view('admin.userParameters.index', compact('userParameters'));
    }

    public function create()
    {
        abort_if(Gate::denies('user_parameter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userParameters.create');
    }

    public function store(StoreUserParameterRequest $request)
    {
        $userParameter = UserParameter::create($request->all());

        return redirect()->route('admin.user-parameters.index');
    }

    public function edit(UserParameter $userParameter)
    {
        abort_if(Gate::denies('user_parameter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userParameters.edit', compact('userParameter'));
    }

    public function update(UpdateUserParameterRequest $request, UserParameter $userParameter)
    {
        $userParameter->update($request->all());

        return redirect()->route('admin.user-parameters.index');
    }

    public function show(UserParameter $userParameter)
    {
        abort_if(Gate::denies('user_parameter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.userParameters.show', compact('userParameter'));
    }

    public function destroy(UserParameter $userParameter)
    {
        abort_if(Gate::denies('user_parameter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userParameter->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserParameterRequest $request)
    {
        UserParameter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
