<x-app-layout>
    <div class="container">
        <h2>Create a New Booking</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="car_id" class="form-label">Car</label>
                <select name="car_id" id="car_id" class="form-control">
                    @foreach($cars as $car)
                        <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="pickup_location_id" class="form-label">Pickup Location</label>
                <select name="pickup_location_id" id="pickup_location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="dropoff_location_id" class="form-label">Dropoff Location</label>
                <select name="dropoff_location_id" id="dropoff_location_id" class="form-control">
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="total_price" class="form-label">Total Price</label>
                <input type="number" step="0.01" name="total_price" id="total_price" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
    </div>
</x-app-layout>
