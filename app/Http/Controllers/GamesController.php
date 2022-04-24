<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\GameViewModel;
use App\Models\Game;

class GamesController extends Controller
{
    /**
     * Возвращает список игр
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(GameViewModel::index());
    }

    /**
     * Создает новую игру
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json(GameViewModel::store($request));
    }

    /**
     * Просмотр игры
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(GameViewModel::show($id));
    }

    /**
     * Изменяет игру по id
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->json(GameViewModel::update($request, $id));
    }

    /**
     * Удаляет игру
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return GameViewModel::destroy($id);
    }
    
    /**
     * Возвращает список игр
     *
     * @return \Illuminate\Http\Response
     */
    public function searchGamesGenre($id)
    {
        return response()->json(GameViewModel::searchGamesGenre($id));
    }
}
