<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\VeterinaryRecord;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $animalsCount = Animal::count();
        $recordsCount = VeterinaryRecord::count();
        $emergencyRecords = VeterinaryRecord::where('is_emergency', true)->count();

        $latestRecords = VeterinaryRecord::with('animal')
            ->latest('treatment_date')
            ->latest('treatment_time')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'animalsCount',
            'recordsCount',
            'emergencyRecords',
            'latestRecords'
        ));
    }
}
