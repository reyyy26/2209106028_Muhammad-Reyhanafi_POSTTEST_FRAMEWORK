<?php

namespace App\Http\Controllers;

use App\Models\VeterinaryRecord;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VeterinaryRecordController extends Controller
{
    /**
     * Display a listing of veterinary records.
     */
    public function index(Request $request): View
    {
        $query = VeterinaryRecord::with('animal');

        // Filter by emergency status if requested
        if ($request->has('emergency') && $request->emergency !== '') {
            $query->where('is_emergency', (bool) $request->emergency);
        }

        // Filter by severity if requested
        if ($request->has('severity') && $request->severity !== '') {
            $query->where('severity', $request->severity);
        }

        // Filter by status if requested
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Search by veterinarian name or treatment type
        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('veterinarian_name', 'LIKE', "%{$search}%")
                    ->orWhere('treatment_type', 'LIKE', "%{$search}%")
                    ->orWhere('diagnosis', 'LIKE', "%{$search}%");
            });
        }

        $records = $query->orderBy('treatment_date', 'desc')
            ->orderBy('treatment_time', 'desc')
            ->paginate(10);

        // Get summary statistics
        $stats = [
            'total' => VeterinaryRecord::count(),
            'emergency' => VeterinaryRecord::where('is_emergency', true)->count(),
            'critical' => VeterinaryRecord::where('severity', 'critical')->count(),
            'this_month' => VeterinaryRecord::whereMonth('treatment_date', now()->month)
                ->whereYear('treatment_date', now()->year)
                ->count(),
        ];

        return view('veterinary-records.index', compact('records', 'stats'));
    }
}