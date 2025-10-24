@csrf

@php($animalModel = $animal ?? null)

<div class="grid gap-5 md:grid-cols-2">
    <div class="space-y-2">
        <label for="name" class="block text-sm font-medium text-slate-200">Nama</label>
        <input id="name" name="name" type="text" value="{{ old('name', optional($animalModel)->name) }}" required class="input-field" placeholder="Contoh: Bima">
    </div>

    <div class="space-y-2">
        <label for="species" class="block text-sm font-medium text-slate-200">Spesies</label>
        <input id="species" name="species" type="text" value="{{ old('species', optional($animalModel)->species) }}" required class="input-field" placeholder="Sapi, Kambing, Domba">
    </div>

    <div class="space-y-2">
        <label for="breed" class="block text-sm font-medium text-slate-200">Breed</label>
        <input id="breed" name="breed" type="text" value="{{ old('breed', optional($animalModel)->breed) }}" class="input-field" placeholder="Opsional">
    </div>

    <div class="space-y-2">
        <label for="age" class="block text-sm font-medium text-slate-200">Umur (tahun)</label>
        <input id="age" name="age" type="number" min="0" value="{{ old('age', optional($animalModel)->age ?? 0) }}" required class="input-field">
    </div>

    <div class="space-y-2 md:col-span-2">
        <label for="image_url" class="block text-sm font-medium text-slate-200">URL Gambar</label>
        <input id="image_url" name="image_url" type="url" value="{{ old('image_url', optional($animalModel)->image_url) }}" class="input-field" placeholder="https://...">
    </div>

    <div class="space-y-2 md:col-span-2">
        <label for="description" class="block text-sm font-medium text-slate-200">Deskripsi</label>
        <textarea id="description" name="description" rows="4" class="input-field" placeholder="Catatan singkat mengenai kondisi hewan">{{ old('description', optional($animalModel)->description) }}</textarea>
    </div>
</div>

<div class="flex justify-end gap-3">
    <a href="{{ route('dashboard.animals.index') }}" class="nav-link">Batal</a>
    <button type="submit" class="button-primary">Simpan</button>
</div>
