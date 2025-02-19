<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('booking.store') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">User</label>
                    <select name="user_id" class="shadow appearance-none border rounded w-full py-2 px-3">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Car</label>
                    <select name="car_id" class="shadow appearance-none border rounded w-full py-2 px-3">
                        @foreach ($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->model }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Create Booking</button>
            </form>
        </div>
    </div>
</x-app-layout>
