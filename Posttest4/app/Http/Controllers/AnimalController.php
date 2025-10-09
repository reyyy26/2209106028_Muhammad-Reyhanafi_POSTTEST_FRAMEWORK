<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $speciesFilter = $request->query('species');
        $perPage = 9;

        $query = Animal::query()->withCount('veterinaryRecords');

        // Pencarian di name, breed, description
        if (!empty($q)) {
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('breed', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
            });
        }

        // Filter species
        if (!empty($speciesFilter)) {
            $query->where('species', $speciesFilter);
        }

        // Ambil data halaman sekarang
        $animals = $query
            ->orderBy('species')
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

        // Statistik akurat
        $total = Animal::count();

        $bySpecies = Animal::select('species', DB::raw('COUNT(*) as count'), DB::raw('AVG(age) as avg_age'))
            ->groupBy('species')
            ->orderBy('species')
            ->get();

        // Untuk dropdown filter: ambil daftar species yang ada
        $speciesList = Animal::select('species')->distinct()->orderBy('species')->pluck('species');

        return view('animals.index', compact('animals', 'total', 'bySpecies', 'speciesList', 'q', 'speciesFilter'));
    }
}
