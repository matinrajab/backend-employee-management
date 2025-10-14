<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'nip' => ['nullable', 'string', 'max:255', 'unique:employees'],
            'name' => ['nullable', 'string', 'max:255'],
            'photo' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'max:255', 'unique:employees'],
            'npwp' => ['nullable', 'string', 'max:255', 'unique:employees'],
            'birth_place' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'work_place' => ['nullable', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender_id' => ['required', 'exists:genders,id'],
            'golongan_id' => ['required', 'exists:golongans,id'],
            'eselon_id' => ['nullable', 'exists:eselons,id'],
            'position' => ['nullable', 'string', 'max:255'],
            'religion_id' => ['required', 'exists:religions,id'],
            'work_unit' => ['nullable', 'string', 'max:255'],
        ];
    }
}
            // 'photo' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp,gif,svg'],
