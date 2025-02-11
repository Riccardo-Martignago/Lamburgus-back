<x-app-layout>
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-lg">
        <h2 class="mb-4 text-2xl font-bold">{{ $car->brand }} {{ $car->model }}</h2>

        <ul class="mb-4">
            <li><strong>Brend:</strong> {{ $car->brand }}</li>
            <li><strong>Model:</strong> {{ $car->model }}</li>
            <li><strong>Year:</strong> {{ $car->year }}</li>
            <li><strong>License plate:</strong> {{ $car->license_plate }}</li>
            <li><strong>Company:</strong> {{ $car->company->name }}</li>
        </ul>

        <!-- Pulsante per tornare alla lista delle auto della stessa azienda -->
        <a href="{{ route('car.index', ['company_id' => $car->company_id]) }}"
            class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
            Return to car list
        </a>
        <form action="{{ route('car.destroy', $car->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                Delete
            </button>
        </form>
    </div>
</x-app-layout>