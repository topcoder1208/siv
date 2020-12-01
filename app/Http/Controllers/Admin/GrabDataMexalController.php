<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGrabDataMexalRequest;
use App\Http\Requests\StoreGrabDataMexalRequest;
use App\Http\Requests\UpdateGrabDataMexalRequest;
use App\Models\GrabDataMexal;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GrabDataMexalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('grab_data_mexal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grabDataMexals = GrabDataMexal::all();

        return view('admin.grabDataMexals.index', compact('grabDataMexals'));
    }

    public function create()
    {
        abort_if(Gate::denies('grab_data_mexal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grabDataMexals.create');
    }

    public function store(StoreGrabDataMexalRequest $request)
    {
        $grabDataMexal = GrabDataMexal::create($request->all());

        return redirect()->route('admin.grab-data-mexals.index');
    }

    public function edit(GrabDataMexal $grabDataMexal)
    {
        abort_if(Gate::denies('grab_data_mexal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grabDataMexals.edit', compact('grabDataMexal'));
    }

    public function update(UpdateGrabDataMexalRequest $request, GrabDataMexal $grabDataMexal)
    {
        $grabDataMexal->update($request->all());

        return redirect()->route('admin.grab-data-mexals.index');
    }

    public function show(GrabDataMexal $grabDataMexal)
    {
        abort_if(Gate::denies('grab_data_mexal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.grabDataMexals.show', compact('grabDataMexal'));
    }

    public function destroy(GrabDataMexal $grabDataMexal)
    {
        abort_if(Gate::denies('grab_data_mexal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $grabDataMexal->delete();

        return back();
    }

    public function massDestroy(MassDestroyGrabDataMexalRequest $request)
    {
        GrabDataMexal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
