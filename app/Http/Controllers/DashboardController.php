<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'totalContacts' => auth()->user()->contacts()->count(),
            'upcomingBirthdays' => auth()->user()->contacts()
                ->upcomingBirthdays()
                ->orderByRaw("DATE_FORMAT(date_of_birth, '%m-%d')")
                ->limit(5)
                ->get(),
        ]);
    }
}
