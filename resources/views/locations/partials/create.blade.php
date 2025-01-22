<form method="POST" action="{{ route('locations') }}">
    <div>
        <x-text-input id="new_location_name" class="block w-full mt-1" type="text" name="new_location_name" placeholder="Location Name" />
        <x-text-input id="new_location_address" class="block w-full mt-1" type="text" name="new_location_address" placeholder="Location Address" />
    </div>
</form>
