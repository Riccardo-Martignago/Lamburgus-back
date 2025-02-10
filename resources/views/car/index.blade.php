<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="mb-6 text-3xl font-bold text-gray-800 dark:text-white">Car List</h2>

            @if (session('success'))
                <div class="p-4 mb-6 text-green-800 bg-green-200 border border-green-400 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('car.create', ['company_id' => request('company_id')]) }}"
                class="inline-block px-4 py-2 mb-6 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Add New Car
            </a>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($cars as $car)
                    <div class="max-w-sm overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <div class="px-6 py-4">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">{{ $car->brand }} {{ $car->model }}</h3>
                            <p class="mt-2 text-gray-700 dark:text-gray-300">Year: {{ $car->year }}</p>
                            <p class="text-gray-700 dark:text-gray-300">License Plate: {{ $car->license_plate }}</p>
                            <p class="text-gray-700 dark:text-gray-300">Company: {{ $car->company->name }}</p>
                        </div>
                        <div class="flex items-center justify-between px-6 py-4">
                            <a href="{{ route('car.show', $car->id) }}"
                                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Show
                            </a>
                            <a href="{{ route('car.edit', $car->id) }}"
                                class="px-4 py-2 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">
                                Edit
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>