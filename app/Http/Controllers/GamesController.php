<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

// Models
use App\Models\Game;
use App\Models\TicketPrint;
use App\Models\Ticket;

class GamesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function tickets_index($game){
        $game = Game::find($game);
        return view('games.tickets', compact('game'));
    }

    public function tickets_print($game, $id = null){
        $game = Game::find($game);
        $ticket_prints = $id ? TicketPrint::where('id', $id)->first() : null;
        return view('games.print.ticket', compact('game', 'ticket_prints'));
    }

    public function tickets_generate($id, Request $request) {
        DB::beginTransaction();
        try {
            // Se debe incluir el numero inicial en el lote
            $finish_number = $request->start_number + $request->quantity -1;
            $lote = TicketPrint::create([
                'user_id' => Auth::user()->id,
                'game_id' => $request->game_id,
                'branch_office_id' => $request->branch_office_id,
                'type' => $request->type,
                'price' => $request->price,
                'start_number' => $request->start_number,
                'finish_number' => $finish_number,
                'observations' => $request->observations
            ]);

            for ($i = $request->start_number; $i <= $finish_number; $i++) { 
                Ticket::create([
                    'user_id' => Auth::user()->id,
                    'ticket_print_id' => $lote->id,
                    'number' => $i,
                    'code' => Str::random(50)
                ]);
            }

            DB::commit();
            return redirect()->route('games.tickets.index', ['game' => $id])->with(['message' => 'Lote generado exitosamente.', 'alert-type' => 'success']);
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            return redirect()->route('games.tickets.index', ['game' => $id])->with(['message' => 'Ocurrió un error.', 'alert-type' => 'error']);
        }
    }
}
