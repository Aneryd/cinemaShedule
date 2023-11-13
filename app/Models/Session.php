<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        "film_id",
        "time_date",
        "price"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        'time_date' => 'datetime'
    ];

    public function film(){
        return $this->hasOne(Film::class, "id", "film_id");
    }
}
