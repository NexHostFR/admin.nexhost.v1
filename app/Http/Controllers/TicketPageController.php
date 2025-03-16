<?php

namespace App\Http\Controllers;

use App\Models\ReponseTicket;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketPageController extends Controller
{
    public function viewTicket($id) {
        return view("tickets.view", [
            "ticket" => Ticket::find($id)
        ]);
    }

    public function postResponseTicket(Request $request, $id) {
        try {
            $ReponseManager = new ReponseTicket();
            $ReponseManager->ticket_id = $id;
            $ReponseManager->user_id = Auth::user()->id;
            $ReponseManager->content = $request->contentReponse;
            $ReponseManager->save();

            $TicketManager = Ticket::find($id);
            $TicketManager->status = "support";
            $TicketManager->save();
        } catch (\Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ]);
        }



        return redirect()->to("/");
    }
}
