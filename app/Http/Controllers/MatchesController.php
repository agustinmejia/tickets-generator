<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function print_demo(){
        return view('matches.print.tickets');
    }
}
