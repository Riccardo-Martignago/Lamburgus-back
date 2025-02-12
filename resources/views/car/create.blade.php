<x-guest-layout>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('car.store') }}" method="POST">
            @csrf

            @if(isset($selectedCompany))
                <label for="company_id">Company:</label>
                <input type="text" value="{{ $selectedCompany->name }}" disabled>
                <input type="hidden" name="company_id" value="{{ $selectedCompany->id }}">
            @endif

            <div class="mb-3">
                <label for="model" class="form-label">Model:</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand:</label>
                <input type="text" name="brand" id="brand" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year:</label>
                <input type="number" name="year" id="year" class="form-control" min="1900" max="{{ date('Y') }}" required>
            </div>

            <div class="mb-3">
                <label for="license_plate" class="form-label">License plate:</label>
                <input type="text" name="license_plate" id="license_plate" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    </x-guest-layout>
