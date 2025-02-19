<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg dark:bg-gray-800">
                <div class="px-6 py-4">
                    <h2 class="text-xl font-bold text-gray-800 dark:text-white">Booking #{{ $booking->id }}</h2>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">User: {{ $booking->user->name }}</p>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">Car: {{ $booking->car->model }}</p>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">Total Price: ${{ $booking->total_price }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
