<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgentRequest;
use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = Agent::all();

        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        abort_if(Gate::denies('agent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agents.create');
    }

    public function store(StoreAgentRequest $request)
    {
        $agent = Agent::create($request->all());

        return redirect()->route('admin.agents.index');
    }

    public function edit(Agent $agent)
    {
        abort_if(Gate::denies('agent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agents.edit', compact('agent'));
    }

    public function update(UpdateAgentRequest $request, Agent $agent)
    {
        $agent->update($request->all());

        return redirect()->route('admin.agents.index');
    }

    public function show(Agent $agent)
    {
        abort_if(Gate::denies('agent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agents.show', compact('agent'));
    }

    public function destroy(Agent $agent)
    {
        abort_if(Gate::denies('agent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agent->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgentRequest $request)
    {
        Agent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
