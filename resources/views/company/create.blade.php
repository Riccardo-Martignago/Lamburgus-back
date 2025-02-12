<x-guest-layout>
    <form action="{{ route('company.store') }}" method="POST" class="p-6 bg-white rounded-lg shadow-md">
        @csrf

        {{-- Company Name --}}
        <div class="mb-4">
            <label for="name" class="block mb-2 font-bold text-gray-700">Company Name</label>
            <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Company Email --}}
        <div class="mb-4">
            <label for="email" class="block mb-2 font-bold text-gray-700">Company Email</label>
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Phone --}}
        <div class="mb-4">
            <label for="phone_number" class="block mb-2 font-bold text-gray-700">Phone</label>
            <input type="text" name="phone_number" id="phone_number" class="w-full p-2 border border-gray-300 rounded-lg" required>
        </div>

        {{-- Location --}}
        <div class="mb-4">
            <label for="location_id" class="block mb-2 font-bold text-gray-700">Select a location</label>
            <select name="location_id" id="location_id" class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="">Select a location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- New Location --}}
        <div class="pt-4 mb-4 border-t">
            <p class="font-bold text-gray-700">Create a location:</p>

            <label for="new_location_name" class="block mt-2 text-gray-700">Location Name</label>
            <input type="text" name="new_location_name" id="new_location_name" class="w-full p-2 border border-gray-300 rounded-lg">

            <label for="latitude" class="block mt-2 text-gray-700">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="w-full p-2 border border-gray-300 rounded-lg">

            <label for="longitude" class="block mt-2 text-gray-700">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="w-full p-2 border border-gray-300 rounded-lg">

            <button id="addLocationBtn" type="button" class="px-4 py-2 mt-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Add location
            </button>
        </div>

        {{-- Pulsante di invio --}}
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Create company
            </button>
        </div>
    </form>

    <script>
        document.getElementById("addLocationBtn").addEventListener("click", function(event) {
            event.preventDefault();

            let name = document.getElementById("new_location_name").value;
            let latitude = document.getElementById("latitude").value;
            let longitude = document.getElementById("longitude").value;

            if (!name || !latitude || !longitude) {
                alert("Fill all the fields of the new location!");
                return;
            }

            fetch("{{ route('locations.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    name: name,
                    latitude: latitude,
                    longitude: longitude
                })
            })
            .then(response => response.json())
            .then(data => {
                let select = document.getElementById("location_id");
                let option = document.createElement("option");
                option.value = data.location.id;
                option.textContent = data.location.name;
                option.selected = true;
                select.appendChild(option);

                document.getElementById("new_location_name").value = "";
                document.getElementById("latitude").value = "";
                document.getElementById("longitude").value = "";

                alert("Position added successfully!");
            })
            .catch(error => console.error("Errore:", error));
        });
    </script>
</x-guest-layout>
