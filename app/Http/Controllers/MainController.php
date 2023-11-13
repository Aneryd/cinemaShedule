<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MainService;

class MainController extends Controller
{
    public function index(MainService $service){
        return $service->index();
    }
}
