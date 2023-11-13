<?php

namespace App\Services;

use App\Models\Film;
use App\Models\Session;
use App\Http\Requests\Admin\SessionRequest;

class SessionService{
    public function index(){
        $sessions = Session::orderBy("time_date", "desc")->with("film")->paginate(12);
        return view("admin.sessions.index", compact("sessions"));
    }

    public function create(){
        $films = Film::select("id", "name")->get();
        return view("admin.sessions.create", compact("films"));
    }

    public function show(){

    }
    public function store(SessionRequest $request){
        if(!Session::whereBetween("time_date", [date('Y-m-d H:i:s', strtotime($request->time_date. ' -30 minutes')), 
            date('Y-m-d H:i:s', strtotime($request->time_date. ' +30 minutes'))])->count() > 0){
            $table = Session::create([
                "film_id" => $request->film_id,
                "time_date" => $request->time_date,
                "price" => $request->price
            ]);
            return response()->json(["success" => true]);
        }else{
            return response()->json(["message" => "Время между сеансами должно быть не менее 30 минут"], 422);
        }
    }

    public function edit(Session $session){
        $films = Film::select("id", "name")->get();
        return view("admin.sessions.edit", compact("session", "films"));
    }
    
    public function update(SessionRequest $request, Session $session)
    {
        if(!Session::where("id", "!=", $session->id)->whereBetween("time_date", [date('Y-m-d H:i:s', strtotime($request->time_date. ' -30 minutes')), 
            date('Y-m-d H:i:s', strtotime($request->time_date. ' +30 minutes'))])->count() > 0){
            $session->update([
                "film_id" => $request->film_id,
                "time_date" => $request->time_date,
                "price" => $request->price
            ]);
            return response()->json(["success" => true]);
        }else{
            return response()->json(["message" => "Время между сеансами должно быть не менее 30 минут"], 422);
        }
    }

    public function destroy(Session $session){
        $session->delete();
        return redirect()->route("sessions.index");
    }
}