<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "photo",
        "description",
        "duration",
        "age_rating_id"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    public function getPhotoAttribute($value){
        return "/storage/film/".$this->id.'.'.$value;
    }

    public function age_ratings(){
        return $this->hasOne(AgeRating::class, "id", "age_rating_id");
    }
}
