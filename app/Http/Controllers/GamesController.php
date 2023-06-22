<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Game;

class GamesController extends Controller
{
    public function tickets_index($game){
        $game = Game::find($game);
        return view('games.tickets', compact('game'));
    }

    public function tickets_print($game, $id = null){
        $game = Game::find($game);
        return view('games.print.ticket', compact('game'));
    }
}
