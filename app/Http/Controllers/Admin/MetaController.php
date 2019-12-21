<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetumRequest;
use App\Http\Requests\StoreMetumRequest;
use App\Http\Requests\UpdateMetumRequest;
use App\Metum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meta = Metum::all();

        return view('admin.meta.index', compact('meta'));
    }

    public function create()
    {
        abort_if(Gate::denies('metum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meta.create');
    }

    public function store(StoreMetumRequest $request)
    {
        $metum = Metum::create($request->all());

        return redirect()->route('admin.meta.index');
    }

    public function edit(Metum $metum)
    {
        abort_if(Gate::denies('metum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meta.edit', compact('metum'));
    }

    public function update(UpdateMetumRequest $request, Metum $metum)
    {
        $metum->update($request->all());

        return redirect()->route('admin.meta.index');
    }

    public function destroy(Metum $metum)
    {
        abort_if(Gate::denies('metum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metum->delete();

        return back();
    }

    public function massDestroy(MassDestroyMetumRequest $request)
    {
        Metum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
