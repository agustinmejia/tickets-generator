<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\Match;

class MatchesController extends Controller
{
    public function tickets_index($match){
        return view('matches.tickets', compact('match'));
    }

    public function tickets_print($match, $id = null){
        $match = Match::find($match);
        return view('matches.print.ticket', compact('match'));
    }
}
