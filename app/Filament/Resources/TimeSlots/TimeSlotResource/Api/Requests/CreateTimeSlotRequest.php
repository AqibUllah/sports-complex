<?php

namespace App\Filament\Resources\TimeSlots\TimeSlotResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTimeSlotRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'facility_id' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
			'max_capacity' => 'required',
			'available_spots' => 'required',
			'price' => 'required',
			'is_available' => 'required'
		];
    }
}
