<x-guest-layout>
    <form action="{{ route('company.store') }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
        @csrf {{-- Token CSRF obbligatorio --}}

        {{-- Nome Azienda --}}
        <div class="mb-4">
            <label for="name" class="block mb-2 font-bold text-gray-700">Nome dell'Azienda</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Email Azienda --}}
        <div class="mb-4">
            <label for="email" class="block mb-2 font-bold text-gray-700">Email dell'Azienda</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Numero di Telefono --}}
        <div class="mb-4">
            <label for="phone_number" class="block mb-2 font-bold text-gray-700">Numero di Telefono</label>
            <input type="text" name="phone_number" id="phone_number" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Location ID --}}
        <div class="mb-4">
            <label for="location_id" class="block mb-2 font-bold text-gray-700">Posizione</label>
            <select name="location_id" id="location_id" class="w-full p-2 border border-gray-300 rounded-lg" required>
                {{-- Supponendo che tu passi una variabile $locations al Blade --}}
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pulsante di invio --}}
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Crea Azienda
            </button>
        </div>
    </form>
</x-guest-layout>
