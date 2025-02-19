<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @foreach ($bookings as $booking)
                <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg dark:bg-gray-800">
                    <div class="px-6 py-4">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">Booking #{{ $booking->id }}</h2>
                        <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                            User: {{ $booking->user->name }}
                        </p>
                        <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                            Car: {{ $booking->car->model }}
                        </p>
                        <a href="{{ route('booking.show', $booking->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Show</a>
                    </div>
                </div>
            @endforeach
            <a href="{{ route('booking.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Add new booking</a>
        </div>
    </div>
</x-app-layout>
