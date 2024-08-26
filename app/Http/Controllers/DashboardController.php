<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Obținem numărul total de clienți
        $totalClients = Client::count();

        // Obținem numărul de clienți pentru ultimele 7 zile
        $clientsLast7Days = Client::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->pluck('count', 'date');

        // Completăm cu zero pentru zilele în care nu s-au înregistrat clienți
        $days = collect();
        foreach (range(0, 6) as $i) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $days->put($date, $clientsLast7Days->get($date, 0));
        }

        return view('dashboard', compact('totalClients', 'days'));
    }
}
