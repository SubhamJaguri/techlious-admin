<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetumRequest;
use App\Http\Requests\UpdateMetumRequest;
use App\Http\Resources\Admin\MetumResource;
use App\Metum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetumResource(Metum::all());
    }

    public function store(StoreMetumRequest $request)
    {
        $metum = Metum::create($request->all());

        return (new MetumResource($metum))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateMetumRequest $request, Metum $metum)
    {
        $metum->update($request->all());

        return (new MetumResource($metum))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Metum $metum)
    {
        abort_if(Gate::denies('metum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metum->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
