<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RentalPlansRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return Auth::check(); // Controlla se l'utente è autenticato
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'location_id' => 'required|exists:locations,id',
            'car_id' => 'required|exists:cars,id',
            'daily_rate' => 'required|numeric|min:0',
            'hourly_rate' => 'required|numeric|min:0',
            'available_from' => 'required|date',
            'available_to' => 'required|date|after_or_equal:available_from',
        ];
    }
}
