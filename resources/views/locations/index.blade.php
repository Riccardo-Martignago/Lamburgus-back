
    <h1 class="text-2xl font-bold">Locations</h1>

    <table class="w-full border border-collapse border-gray-300 table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-gray-300">#</th>
                <th class="px-4 py-2 border border-gray-300">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td class="px-4 py-2 border border-gray-300">{{ $location->id }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $location->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
