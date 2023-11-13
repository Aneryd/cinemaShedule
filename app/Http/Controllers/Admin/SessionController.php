<?php

namespace App\Http\Controllers\Admin;

use App\Models\Session;
use Illuminate\Http\Request;
use App\Services\SessionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SessionRequest;

class SessionController extends Controller
{
    public function index(SessionService $service)
    {
        return $service->index();
    }

    public function create(SessionService $service)
    {
        return $service->create();
    }

    public function store(SessionRequest $request, SessionService $service)
    {
        return $service->store($request);
    }

    public function show(Session $session)
    {
        //
    }

    public function edit(Session $session, SessionService $service)
    {
        return $service->edit($session);
    }

    public function update(SessionRequest $request, Session $session, SessionService $service)
    {
        return $service->update($request, $session);
    }

    public function destroy(Session $session, SessionService $service)
    {
        return $service->destroy($session);
    }
}
