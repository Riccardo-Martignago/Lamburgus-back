<x-app-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-lg overflow-hidden bg-white rounded shadow-lg dark:bg-gray-800">
                <div class="px-6 py-4">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">{{ $company->name }}</h2>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                        Email: {{ $company->email }}
                    </p>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                        Phone Number: {{ $company->phone_number }}
                    </p>
                    <p class="mt-2 text-base text-gray-700 dark:text-gray-300">
                        Location: {{ $location->name }}
                    </p>
                </div>
                <div class="flex items-center justify-between px-6 py-4">
                    <a href="{{ route('company.edit', $company->id) }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Edit
                    </a>
                    <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                            Delete
                        </button>
                    </form>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Updated at {{ $company->updated_at }} </span>
                </div>
                <a href="{{ route('car.index', ['company_id' => $company->id]) }}"
                    class="px-4 py-2 mt-4 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Car List
                </a>
            </div>
            <a href="{{ route('company.index') }}" class="inline-block px-4 py-2 mt-4 text-white bg-gray-500 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                Back to List
            </a>
        </div>
    </div>
</x-app-layout>
