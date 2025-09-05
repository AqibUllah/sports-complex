<?php

namespace App\Filament\Resources\MembershipPlans\MembershipPlanResource\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMembershipPlanRequest extends FormRequest
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
			'name' => 'required',
			'facility_id' => 'required',
			'price' => 'required|numeric',
			'duration_type' => 'required',
			'duration_value' => 'required',
			'details' => 'required|string',
			'services' => 'required',
			'max_visits' => 'required',
			'max_visits_per_day' => 'required',
			'max_visits_per_month' => 'required',
			'max_visits_per_year' => 'required',
			'is_popular' => 'required',
			'status' => 'required'
		];
    }
}
