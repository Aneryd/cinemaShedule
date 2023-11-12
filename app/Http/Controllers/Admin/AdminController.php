<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\AdminService;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(AdminService $service){
        return $service->index();
    }
}
