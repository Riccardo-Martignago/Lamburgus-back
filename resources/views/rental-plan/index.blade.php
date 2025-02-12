<x-guest-layout>
    <div class="py-10 mx-auto max-w-7xl">
        <h1 class="mb-4 text-2xl font-bold">Rental Plans</h1>

        <a href="{{ route('rental-plan.create') }}" class="px-4 py-2 text-white bg-green-500 rounded">Create New Plan</a>

        <table class="w-full mt-4 border border-collapse border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Car</th>
                    <th class="p-2 border">Location</th>
                    <th class="p-2 border">Daily Rate</th>
                    <th class="p-2 border">Hourly Rate</th>
                    <th class="p-2 border">Available From</th>
                    <th class="p-2 border">Available To</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentalPlans as $plan)
                    <tr>
                        <td class="p-2 border">{{ $plan->car->model }}</td>
                        <td class="p-2 border">{{ $plan->location->name }}</td>
                        <td class="p-2 border">${{ $plan->daily_rate }}</td>
                        <td class="p-2 border">${{ $plan->hourly_rate }}</td>
                        <td class="p-2 border">{{ $plan->available_from }}</td>
                        <td class="p-2 border">{{ $plan->available_to }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('rental-plan.show', $plan->id) }}" class="text-blue-500">View</a> |
                            <a href="{{ route('rental-plan.edit', $plan->id) }}" class="text-yellow-500">Edit</a> |
                            <form action="{{ route('rental-plan.destroy', $plan->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $rentalPlans->links() }}
    </div>
</x-guest-layout>
