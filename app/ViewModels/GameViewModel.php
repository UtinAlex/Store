<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use App\Models\Game;
use App\Models\Title;
use App\Models\Studio;
use App\Models\Genre;

class GameViewModel extends ViewModel
{
    public function __construct()
    {
        //
    }

    /**
     * Преобразует id в значения
     *
     * @return array
     */
    public static function index(): array
    {
        $games = Game::query()->paginate(10);
        $valuesIdGames = [];
        $valuesArrIdGames = [];
        foreach ($games as $arrGames) {
            $id = $arrGames['id'];
            $idTitle = $arrGames['title_id'];
            $idStudio = $arrGames['studio_id'];
            $idGenre = $arrGames['genre_id'];
            $modelTitle = Title::find($idTitle);
            $modelStudio = Studio::find($idStudio);
            $modelGenre = Genre::find($idGenre);

            $valuesIdGames += ['id' => $id];
            $valuesIdGames += ['title' => $modelTitle->title_games];
            $valuesIdGames += ['studio' => $modelStudio->studio_games];
            $valuesIdGames += ['genre' => $modelGenre->genre_games];
            array_push($valuesArrIdGames, $valuesIdGames);
            
            $valuesIdGames = [];
        }
        array_push($valuesArrIdGames, $games);

        return $valuesArrIdGames;
    }

    /**
     * Создает запись новой игры
     *
     * @return array
     */
    public static function store($request)
    {
        return self::show(Game::store($request));
    }

    /**
     * Возвращает игру по id
     *
     * @return array
     */
    public static function show($id)
    {
        $valuesIdGames = [];
        $modelGame = Game::findOrFail($id);
        $modelTitle = Title::findOrFail($modelGame->title_id);
        $modelStudio = Studio::findOrFail($modelGame->studio_id);
        $modelGenre = Genre::findOrFail($modelGame->genre_id);
        $valuesIdGames += ['id' => $modelGame->id];
        $valuesIdGames += ['title' => $modelTitle->title_games];
        $valuesIdGames += ['studio' => $modelStudio->studio_games];
        $valuesIdGames += ['genre' => $modelGenre->genre_games];

        return $valuesIdGames;
    }

    /**
     * Изменяет игру по id
     *
     * @return array
     */
    public static function update($request, $id)
    {
        Game::updateGame($request, $id);

        return self::show($id);
    }

    /**
     * Удаляет игру по id
     *
     * @return array
     */
    public static function destroy($id)
    {
        $modelGame = Game::findOrFail($id);
        $modelGame->delete();

        return response(null, 204);
    }

    /**
     * Преобразует id в значения
     *
     * @return array
     */
    public static function searchGamesGenre($id): array
    {
       
        $games = Game::where('genre_id', $id)->get();
        $valuesIdGames = [];
        $valuesArrIdGames = [];
        foreach ($games as $arrGames) {
            $id = $arrGames['id'];
            $idTitle = $arrGames['title_id'];
            $idStudio = $arrGames['studio_id'];
            $idGenre = $arrGames['genre_id'];
            $modelTitle = Title::find($idTitle);
            $modelStudio = Studio::find($idStudio);
            $modelGenre = Genre::find($idGenre);

            $valuesIdGames += ['id' => $id];
            $valuesIdGames += ['title' => $modelTitle->title_games];
            $valuesIdGames += ['studio' => $modelStudio->studio_games];
            $valuesIdGames += ['genre' => $modelGenre->genre_games];
            array_push($valuesArrIdGames, $valuesIdGames);
            
            $valuesIdGames = [];
        }

        return $valuesArrIdGames;
    }
}
