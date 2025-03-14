<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketPageController extends Controller
{
    public function viewTicket($id) {
        return view("tickets.view", [
            "ticket" => Ticket::find($id)
        ]);
    }

    public function postResponseTicker(Request $request) {

    }
}
