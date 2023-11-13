<?php 

namespace App\Services;

use App\Models\Film;
use App\Models\AgeRating;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\FilmRequest;
use App\Http\Resources\FilmListResource;

class FilmService{
    public function index(){
        $films = Film::orderBy("created_at", "desc")->with("age_ratings")->paginate(12);
        return view("admin.films.index", compact("films"));
    }

    public function create(){
        $age_ratings = AgeRating::all();
        return view("admin.films.create", compact("age_ratings"));
    }

    public function store(FilmRequest $request){
        $photo_extension = $request->file("photo")->extension();
        $table = Film::create([
            "name" => $request->name,
            "photo" => $photo_extension,
            "description" => $request->description,
            "duration" => $request->duration,
            "age_rating_id" => $request->age_rating
        ]);

        Storage::disk("public")->put("film/".$table->id.'.'.$photo_extension, file_get_contents($request->file("photo")));

        return redirect()->route("films.index");
    }

    public function edit(Film $film){
        $age_ratings = AgeRating::all();
        return view("admin.films.edit", compact("film", "age_ratings"));
    }

    public function update(FilmRequest $request, Film $film){
        if($request->has("photo")){
            $photo_extension = $request->file("photo")->extension();
            Storage::disk("public")->delete("film/".$film->id.'.'.$photo_extension);
            Storage::disk("public")->put("film/".$film->id.'.'.$photo_extension, file_get_contents($request->file("photo")));
        }

        $film->update([
            "name" => $request->name,
            "photo" => isset($request->photo) ? $photo_extension : explode('.', explode("/", $film->photo)[3])[1],
            "description" => $request->description,
            "duration" => $request->duration,
            "age_rating_id" => $request->age_rating
        ]);

        return redirect()->route("films.index");
    }

    public function destroy(Film $film){
        $film->delete();
        return redirect()->route("films.index");
    }
}