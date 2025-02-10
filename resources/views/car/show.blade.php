<x-app-layout>
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-2xl font-bold">{{ $car->brand }} {{ $car->model }}</h2>

        <ul class="mb-4">
            <li><strong>Marca:</strong> {{ $car->brand }}</li>
            <li><strong>Modello:</strong> {{ $car->model }}</li>
            <li><strong>Anno:</strong> {{ $car->year }}</li>
            <li><strong>Targa:</strong> {{ $car->license_plate }}</li>
            <li><strong>Azienda:</strong> {{ $car->company->name }}</li>
        </ul>

        <!-- Pulsante per tornare alla lista delle auto della stessa azienda -->
        <a href="{{ route('car.index', ['company_id' => $car->company_id]) }}"
            class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
            Torna alla Lista Auto
        </a>
    </div>
</x-app-layout>