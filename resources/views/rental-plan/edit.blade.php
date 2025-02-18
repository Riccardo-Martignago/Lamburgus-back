<x-app-layout>
    <div class="max-w-4xl py-10 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Edit Rental Plan</h1>

        @if ($errors->any())
            <div class="p-4 mb-4 text-red-600 bg-red-200 rounded">
                <strong>Whoops! Something went wrong.</strong>
                <ul class="mt-2">
                    @foreach ($errors->all() as $error)
                        <li>• {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rental-plan.update', $rentalPlan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Car -->
            <div class="mb-4">
                <label for="car_id" class="block font-semibold">Car</label>
                <select name="car_id" id="car_id" required class="w-full p-2 border rounded">
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}" {{ $rentalPlan->car_id == $car->id ? 'selected' : '' }}>
                            {{ $car->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Location -->
            <div class="mb-4">
                <label for="location_id" class="block font-semibold">Location</label>
                <select name="location_id" id="location_id" required class="w-full p-2 border rounded">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ $rentalPlan->location_id == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Daily Rate -->
            <div class="mb-4">
                <label for="daily_rate" class="block font-semibold">Daily Rate ($)</label>
                <input type="number" id="daily_rate" name="daily_rate" step="0.01" min="0" value="{{ $rentalPlan->daily_rate }}" required
                    class="w-full p-2 border rounded">
            </div>

            <!-- Hourly Rate -->
            <div class="mb-4">
                <label for="hourly_rate" class="block font-semibold">Hourly Rate ($)</label>
                <input type="number" id="hourly_rate" name="hourly_rate" step="0.01" min="0" value="{{ $rentalPlan->hourly_rate }}" required
                    class="w-full p-2 border rounded">
            </div>

            <!-- Available From -->
            <div class="mb-4">
                <label for="available_from" class="block font-semibold">Available From</label>
                <input type="date" id="available_from" name="available_from" value="{{ $rentalPlan->available_from }}" required
                    class="w-full p-2 border rounded">
            </div>

            <!-- Available To -->
            <div class="mb-4">
                <label for="available_to" class="block font-semibold">Available To</label>
                <input type="date" id="available_to" name="available_to" value="{{ $rentalPlan->available_to }}" required
                    class="w-full p-2 border rounded">
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600">
                    Update Rental Plan
                </button>
                <a href="{{ route('rental-plan.index') }}" class="px-4 py-2 ml-4 text-white bg-gray-500 rounded hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
