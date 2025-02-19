<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('booking.update', $booking->id) }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded shadow-md">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-bold text-gray-700">User</label>
                    <select name="user_id" class="w-full px-3 py-2 border rounded shadow appearance-none">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">Update Booking</button>
            </form>
        </div>
    </div>
</x-app-layout>