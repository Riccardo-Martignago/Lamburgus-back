<x-app-layout>
    <div class="container">
        <h2>Lista Auto</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('car.create') }}" class="mb-3 btn btn-primary">Aggiungi Auto</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Azienda</th>
                    <th>Modello</th>
                    <th>Marca</th>
                    <th>Anno</th>
                    <th>Targa</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->company->name }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->license_plate }}</td>
                        <td>
                            <a href="{{ route('car.edit', $car->id) }}" class="btn btn-warning btn-sm">Modifica</a>
                            {{-- <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questa auto?')">Elimina</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
