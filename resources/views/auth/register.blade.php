<script>
    //document.addEventListener('DOMContentLoaded', () => {
    //    const roleCompany = document.getElementById('role_company');
    //    const locationSelection = document.getElementById('location_selection');
    //
    //    document.querySelectorAll('input[name="role"]').forEach(radio => {
    //        radio.addEventListener('change', () => {
    //            if (roleCompany.checked) {
    //                locationSelection.classList.remove('hidden');
    //            } else {
    //                locationSelection.classList.add('hidden');
    //            }
    //        });
    //    });
    //});
    //document.getElementById("submit_button").addEventListener("click", function(){
    //    document.getElementById("register_form").submit();
    //    document.getElementById("locations_selection").submit();
    //});
</script>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" id="register_form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div>
            <x-input-label for="role" :value="__('Role')" />

            <div>
                <x-input-label for="Admin">Admin</x-input-label>
                <x-text-input id="role_admin" class="mt-1" type="radio" name="role" required value="admin" />
            </div>
            <div>
                <x-input-label for="Admin">Company</x-input-label>
                <x-text-input id="role_company" class="mt-1" type="radio" name="role" required value="company" />
            </div>
            <div>
                <x-input-label for="Admin">Customer</x-input-label>
                <x-text-input id="role_customer" class="mt-1" type="radio" name="role" required value="customer" />
            </div>

            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
        </div>

        <!-- Location -->
        {{-- <div x-data
        <div x-data="{ role: '{{ old('role', 'admin') }}' }" x-show="role === 'company'" class="mt-4">
            <x-input-label for="location_id" :value="__('Location')" />
            <select id="location_id" name="location_id" class="block w-full mt-1">
                @include('locations.index')
            </select>
            <x-input-error :messages="$errors->get('location_id')" class="mt-2" />
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    {{-- <form method="POST" action="{{ route('locations.store') }}" id="location_form">
        @csrf

        <div id="location_selection" class="hidden mt-4">
            <x-input-label for="location" :value="__('Select Location')" />
            <select id="location" name="location_id" class="block w-full mt-1">
                @include('locations.index')
            </select>
            <button href="{{ route('locations.create') }}" class="block mt-2 text-blue-500 underline">Add a new location</button>
        </div>
    </form>
    <x-primary-button id="submit_button" class="ms-4">
        {{ __('Register') }}
    </x-primary-button> --}}
</x-guest-layout>
