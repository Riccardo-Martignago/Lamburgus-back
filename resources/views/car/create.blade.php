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

            <div class="mb-3">
                <label for="company_id" class="form-label">Azienda</label>
                <select name="company_id" id="company_id" class="form-control" required>
                    <option value="">Seleziona un'azienda</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Modello</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Marca</label>
                <input type="text" name="brand" id="brand" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Anno</label>
                <input type="number" name="year" id="year" class="form-control" min="1900" max="{{ date('Y') }}" required>
            </div>

            <div class="mb-3">
                <label for="license_plate" class="form-label">Targa</label>
                <input type="text" name="license_plate" id="license_plate" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
    </x-guest-layout>
