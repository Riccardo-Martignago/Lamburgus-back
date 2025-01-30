<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @foreach ($companies as $companies)
                <div class="max-w-sm overflow-hidden bg-white rounded shadow-lg dark:bg-gray-800">
                    <div class="px-6 py-4">
                        <h2 class="text-xl font-bold text-gray-800 dark:text-white">{{ $companies->name }}</h2>
                        <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                            Email: {{ $companies->email }}
                        </p>
                        <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                            Phone Number: {{ $companies->phone_number }}
                        </p>
                        <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                            Location: {{ $companies->location_id }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between px-6 py-4">
                        <a href=" {{ route('company.edit', $companies->id) }} "class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            Edit
                        </a>
                        <span class="text-sm text-gray-500 dark:text-gray-400">updated at {{ $companies->updated_at }} </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
