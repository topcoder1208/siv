<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyNotizieRequest;
use App\Http\Requests\StoreNotizieRequest;
use App\Http\Requests\UpdateNotizieRequest;
use App\Models\Brand;
use App\Models\Notizie;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class NotizieController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notizie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notizies = Notizie::all();

        $brands = Brand::get();

        return view('admin.notizies.index', compact('notizies', 'brands'));
    }

    public function create()
    {
        abort_if(Gate::denies('notizie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.notizies.create', compact('brands'));
    }

    public function store(StoreNotizieRequest $request)
    {
        $notizie = Notizie::create($request->all());

        foreach ($request->input('file_pdf', []) as $file) {
            $notizie->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file_pdf');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $notizie->id]);
        }

        return redirect()->route('admin.notizies.index');
    }

    public function edit(Notizie $notizie)
    {
        abort_if(Gate::denies('notizie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $notizie->load('brand');

        return view('admin.notizies.edit', compact('brands', 'notizie'));
    }

    public function update(UpdateNotizieRequest $request, Notizie $notizie)
    {
        $notizie->update($request->all());

        if (count($notizie->file_pdf) > 0) {
            foreach ($notizie->file_pdf as $media) {
                if (!in_array($media->file_name, $request->input('file_pdf', []))) {
                    $media->delete();
                }
            }
        }

        $media = $notizie->file_pdf->pluck('file_name')->toArray();

        foreach ($request->input('file_pdf', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $notizie->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('file_pdf');
            }
        }

        return redirect()->route('admin.notizies.index');
    }

    public function show(Notizie $notizie)
    {
        abort_if(Gate::denies('notizie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notizie->load('brand');

        return view('admin.notizies.show', compact('notizie'));
    }

    public function destroy(Notizie $notizie)
    {
        abort_if(Gate::denies('notizie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notizie->delete();

        return back();
    }

    public function massDestroy(MassDestroyNotizieRequest $request)
    {
        Notizie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('notizie_create') && Gate::denies('notizie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Notizie();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
