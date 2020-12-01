<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNotizieRequest;
use App\Http\Requests\UpdateNotizieRequest;
use App\Http\Resources\Admin\NotizieResource;
use App\Models\Notizie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotizieApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('notizie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotizieResource(Notizie::with(['brand'])->get());
    }

    public function store(StoreNotizieRequest $request)
    {
        $notizie = Notizie::create($request->all());

        if ($request->input('file_pdf', false)) {
            $notizie->addMedia(storage_path('tmp/uploads/' . $request->input('file_pdf')))->toMediaCollection('file_pdf');
        }

        return (new NotizieResource($notizie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Notizie $notizie)
    {
        abort_if(Gate::denies('notizie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NotizieResource($notizie->load(['brand']));
    }

    public function update(UpdateNotizieRequest $request, Notizie $notizie)
    {
        $notizie->update($request->all());

        if ($request->input('file_pdf', false)) {
            if (!$notizie->file_pdf || $request->input('file_pdf') !== $notizie->file_pdf->file_name) {
                if ($notizie->file_pdf) {
                    $notizie->file_pdf->delete();
                }

                $notizie->addMedia(storage_path('tmp/uploads/' . $request->input('file_pdf')))->toMediaCollection('file_pdf');
            }
        } elseif ($notizie->file_pdf) {
            $notizie->file_pdf->delete();
        }

        return (new NotizieResource($notizie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Notizie $notizie)
    {
        abort_if(Gate::denies('notizie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notizie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
