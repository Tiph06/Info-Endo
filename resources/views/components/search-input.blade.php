<div class="mb-4">
    <x-input-label for="searchInput" value="Rechercher un médecin ou un hôpital :" />

    <div class="flex">
        <input type="text"
            id="searchInput"
            name="searchInput"
            placeholder="Ex : Paris, Lyon, Centre spécialisé..."
            class="flex-1 p-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-pink-300">

        <button onclick="searchLocation()"
            class="bg-pink-600 text-white px-4 rounded-r-md hover:bg-pink-700">
            Rechercher
        </button>
    </div>

    <x-input-error :messages="$errors->get('searchInput')" class="mt-2" />
</div>