<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden theme-transition">
    @if($animal->image_url)
        <img src="{{ $animal->image_url }}" alt="{{ $animal->name }}" class="w-full h-44 object-cover">
    @else
        <div class="w-full h-44 bg-gray-100 dark:bg-gray-700 flex items-center justify-center text-gray-400 dark:text-gray-300">
            No Image
        </div>
    @endif

    <div class="p-4">
        <div class="flex items-start justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">{{ $animal->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-300">{{ $animal->breed ?? 'Breed —' }}</p>
            </div>
            <div class="text-right">
                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">{{ $animal->species }}</span>
            </div>
        </div>

        <p class="mt-3 text-sm text-gray-600 dark:text-gray-300 line-clamp-3">{{ $animal->description }}</p>

        <div class="mt-4 flex items-center justify-between">
            <div class="text-sm text-gray-700 dark:text-gray-200">
                <span class="font-medium">{{ $animal->age }}</span> tahun
            </div>

            @if($animal->age >= 5)
                <span class="text-xs bg-yellow-200 dark:bg-yellow-600 text-yellow-800 dark:text-yellow-900 px-2 py-1 rounded">Senior</span>
            @else
                <span class="text-xs bg-green-100 dark:bg-green-700 text-green-800 dark:text-green-200 px-2 py-1 rounded">Young</span>
            @endif
        </div>
    </div>
</div>
