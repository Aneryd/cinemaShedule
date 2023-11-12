<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgeRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("age_ratings")->insert([
            "name" => "G",
            "description" => "Нет возрастных ограничений"
        ]);
        DB::table("age_ratings")->insert([
            "name" => "PG",
            "description" => "Рекомендуется присутствие родителей"
        ]);
        DB::table("age_ratings")->insert([
            "name" => "PG-13",
            "description" => "Детям до 13 лет просмотр не желателен"
        ]);
        DB::table("age_ratings")->insert([
            "name" => "R",
            "description" => "Лицам до 17 лет обязательно присутствие взрослого"
        ]);
        DB::table("age_ratings")->insert([
            "name" => "NC-17",
            "description" => "Лицам до 18 лет просмотр запрещен"
        ]);
    }
}
