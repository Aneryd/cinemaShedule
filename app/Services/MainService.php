<?php

namespace App\Services;

use App\Models\Session;

class MainService{
    public function index(){
        $sessions = Session::orderBy("time_date", "desc")->with("film")->paginate(12);
        return view("main", compact("sessions"));
    }
}