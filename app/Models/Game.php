<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title_id',
        'studio_id',
        'genre_id',
    ];

    /**
     * Создает запись новой игры
     *
     * @return array
     */
    public static function store($request)
    {
        $title = -1;
        $studio = -1;
        $genre = -1;
        $checkTitle = Title::where('title_games', $request->title)->first();
        if ($checkTitle) {
            $title = $checkTitle->id;
        } else {
            $titleNew = Title::create([
            'title_games' => $request->title,
            ]);
            $title = $titleNew->id;
        }
        $checkStudio = Studio::where('studio_games', $request->studio)->first();
        if ($checkStudio) {
            $studio = $checkStudio->id;
        } else {
            $studioNew = Studio::create([
            'studio_games' => $request->studio,
            ]);
            $studio = $studioNew->id;
        }
        $checkGenre = Genre::where('genre_games', $request->genre)->first();
        if ($checkGenre) {
            $genre = $checkGenre->id;
        } else {
             $genreNew = Genre::create([
            'genre_games' => $request->genre,
            ]);
            $genre = $genreNew->id;
        }
       
        $games = Game::create([
            'title_id' => $title,
            'studio_id' => $studio,
            'genre_id' => $genre,
        ]);

        return $games->id;
    }

}
