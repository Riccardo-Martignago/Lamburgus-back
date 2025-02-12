<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $carId = $this->route('id');

        return [
            'company_id' => 'required|exists:companies,id',
            'model' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'license_plate' => 'required|string|unique:cars,license_plate,' . ($carId ?? 'NULL') . ',id',
        ];
    }
}
