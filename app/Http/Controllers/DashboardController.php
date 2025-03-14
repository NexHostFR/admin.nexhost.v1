<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function landingPage() {
        $ticketManager = new Ticket();
        $ticketsListe = $ticketManager->where("status", "client");
        return view('landingPage', [
            "CardListeInformationGeneral" => [
                [
                    "title" => "Nombre de clients",
                    "value" => DB::connection("mysql_manager")->table("users")->count()
                ],
                [
                    "title" => "Nombre de commandes",
                    "value" => DB::connection("mysql_shop")->table("commandes")->count()
                ],
                [
                    "title" => "Nombre de ticket ouvert",
                    "value" => $ticketsListe->count()
                ]
            ],
            "ticketsListe" => $ticketsListe->get()
        ]);
    }
}
