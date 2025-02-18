<x-guest-layout>
    <div class="py-10 mx-auto max-w-7xl">
        <h1 class="mb-4 text-2xl font-bold text-white">Rental Plans</h1>

        <div class="mb-6 space-x-4">
            <a href="{{ route('rental-plan.create', ['car_id' => request('car_id')]) }}"
                class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Create new rental plan
            </a>
        </div>

        <div class="p-4 overflow-x-auto bg-gray-800 rounded-lg">
            <table class="w-full border border-collapse border-gray-300 table-auto">
                <thead class="text-black bg-gray-100">
                    <tr>
                        <th class="p-2 border w-32 min-w-[150px]">Car</th>
                        <th class="p-2 border w-32 min-w-[150px]">Location</th>
                        <th class="p-2 border w-24 min-w-[100px]">Daily Rate</th>
                        <th class="p-2 border w-24 min-w-[100px]">Hourly Rate</th>
                        <th class="p-2 border w-32 min-w-[150px]">Available From</th>
                        <th class="p-2 border w-32 min-w-[150px]">Available To</th>
                        <th class="p-2 border w-40 min-w-[180px]">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-white">
                    @foreach($rentalPlans as $plan)
                        <tr class="bg-gray-700 border-b border-gray-500">
                            <td class="p-2 border">{{ $plan->car->model }}</td>
                            <td class="p-2 border">{{ $plan->location->name }}</td>
                            <td class="p-2 border">${{ number_format($plan->daily_rate, 2) }}</td>
                            <td class="p-2 border">${{ number_format($plan->hourly_rate, 2) }}</td>
                            <td class="p-2 border">{{ $plan->available_from }}</td>
                            <td class="p-2 border">{{ $plan->available_to }}</td>
                            <td class="p-2 space-x-2 text-center border">
                                <a href="{{ route('rental-plan.show', $plan->id) }}" class="text-blue-400 hover:underline">View</a> |
                                <a href="{{ route('rental-plan.edit', $plan->id) }}" class="text-yellow-400 hover:underline">Edit</a> |
                                <form action="{{ route('rental-plan.destroy', $plan->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $rentalPlans->links() }}
        </div>
    </div>
</x-guest-layout>
