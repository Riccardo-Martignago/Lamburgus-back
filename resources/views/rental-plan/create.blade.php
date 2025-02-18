<x-app-layout>
    <div class="max-w-4xl py-10 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Create Rental Plan</h1>

        <form action="{{ route('rental-plan.store') }}" method="POST">
            @csrf

            @if(isset($selectedCar))
                <label for="car_id">Car</label>
                <input type="text" value="{{ $selectedCar->model }}" disabled>
                <input type="hidden" name="car_id" value="{{ $selectedCar->id }}">
            @endif

            <label>Location</label>
            <select name="location_id" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>

            <label>Daily Rate</label>
            <input type="number" name="daily_rate" required>

            <label>Hourly Rate</label>
            <input type="number" name="hourly_rate" required>

            <label>Available From</label>
            <input type="date" name="available_from" required>

            <label>Available To</label>
            <input type="date" name="available_to" required>

            <button type="submit">Save</button>
        </form>
    </div>
</x-app-layout>
