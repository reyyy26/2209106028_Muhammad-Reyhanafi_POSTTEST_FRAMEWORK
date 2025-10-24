<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{
    public function index(): View
    {
        $animals = Animal::withCount('veterinaryRecords')
            ->orderBy('species')
            ->orderBy('name')
            ->paginate(10);

        return view('dashboard.animals.index', compact('animals'));
    }

    public function create(): View
    {
        return view('dashboard.animals.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'species' => 'required|string|max:80',
            'breed' => 'nullable|string|max:120',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url|max:255',
        ]);

        Animal::create($data);

        return redirect()->route('dashboard.animals.index')->with('status', 'Data hewan berhasil ditambahkan.');
    }

    public function edit(Animal $animal): View
    {
        return view('dashboard.animals.edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:120',
            'species' => 'required|string|max:80',
            'breed' => 'nullable|string|max:120',
            'age' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url|max:255',
        ]);

        $animal->update($data);

        return redirect()->route('dashboard.animals.index')->with('status', 'Data hewan berhasil diperbarui.');
    }

    public function destroy(Animal $animal): RedirectResponse
    {
        $animal->delete();

        return redirect()->route('dashboard.animals.index')->with('status', 'Data hewan berhasil dihapus.');
    }
}
