<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Services\FilmService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\FilmRequest;
use App\Http\Resources\FilmListResource;

class FilmController extends Controller
{
    public function index(FilmService $service)
    {
        return $service->index();
    }

    public function create(FilmService $service)
    {
        return $service->create();
    }

    public function store(FilmService $service, FilmRequest $request)
    {
        return $service->store($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Film $film, FilmService $service)
    {
        return $service->edit($film);
    }

    public function update(FilmRequest $request, Film $film, FilmService $service)
    {
        return $service->update($request, $film);
    }

    public function destroy(Film $film, FilmService $service)
    {
        return $service->destroy($film);
    }
}
