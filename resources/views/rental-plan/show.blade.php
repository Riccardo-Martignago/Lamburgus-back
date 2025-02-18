<x-guest-layout>
    <div class="max-w-4xl py-10 mx-auto">
        <h1 class="mb-4 text-2xl font-bold">Rental Plan Details</h1>

        <p><strong>Car:</strong> {{ $rentalPlan->car->model }}</p>
        <p><strong>Location:</strong> {{ $rentalPlan->location->name }}</p>
        <p><strong>Daily Rate:</strong> ${{ $rentalPlan->daily_rate }}</p>
        <p><strong>Hourly Rate:</strong> ${{ $rentalPlan->hourly_rate }}</p>
        <p><strong>Available From:</strong> {{ $rentalPlan->available_from }}</p>
        <p><strong>Available To:</strong> {{ $rentalPlan->available_to }}</p>

        <a href="{{ route('rental-plan.index',['car_id' => $rentalPlan->car_id]) }}" class="mt-4 text-blue-500">Back to List</a>
    </div>
</x-guest-layout>
