<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Models\VeterinaryRecord;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VeterinaryRecordController extends Controller
{
    public function index(): View
    {
        $records = VeterinaryRecord::with('animal')
            ->latest('treatment_date')
            ->latest('treatment_time')
            ->paginate(10);

        return view('dashboard.veterinary-records.index', compact('records'));
    }

    public function create(): View
    {
        $animals = Animal::orderBy('name')->get();

        return view('dashboard.veterinary-records.create', compact('animals'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        VeterinaryRecord::create($data);

        return redirect()->route('dashboard.veterinary-records.index')->with('status', 'Rekam medis berhasil ditambahkan.');
    }

    public function edit(VeterinaryRecord $veterinaryRecord): View
    {
        $animals = Animal::orderBy('name')->get();

        return view('dashboard.veterinary-records.edit', [
            'record' => $veterinaryRecord,
            'animals' => $animals,
        ]);
    }

    public function update(Request $request, VeterinaryRecord $veterinaryRecord): RedirectResponse
    {
        $data = $this->validatedData($request);

        $veterinaryRecord->update($data);

        return redirect()->route('dashboard.veterinary-records.index')->with('status', 'Rekam medis berhasil diperbarui.');
    }

    public function destroy(VeterinaryRecord $veterinaryRecord): RedirectResponse
    {
        $veterinaryRecord->delete();

        return redirect()->route('dashboard.veterinary-records.index')->with('status', 'Rekam medis berhasil dihapus.');
    }

    protected function validatedData(Request $request): array
    {
        $data = $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'veterinarian_name' => 'required|string|max:120',
            'treatment_type' => 'required|string|max:150',
            'treatment_date' => 'required|date',
            'treatment_time' => 'nullable|date_format:H:i',
            'diagnosis' => 'nullable|string',
            'severity' => 'required|in:low,medium,high,critical',
            'status' => 'required|in:scheduled,in_progress,completed,cancelled',
            'cost' => 'nullable|numeric|min:0',
            'is_emergency' => 'nullable|boolean',
            'requires_followup' => 'nullable|boolean',
            'next_checkup' => 'nullable|date',
        ]);

        $data['is_emergency'] = $request->boolean('is_emergency');
        $data['requires_followup'] = $request->boolean('requires_followup');

        return $data;
    }
}
