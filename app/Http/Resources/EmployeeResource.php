<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nip" => $this->nip,
            "name" => $this->name,
            "photo" => $this->photo ? asset('storage/images/' . $this->photo) : null,
            "birth_place" => $this->birthPlace?->name,
            "address" => $this->address?->name,
            "birth_date" => $this->birthDate->date,
            "gender" => $this->gender->name,
            "golongan" => $this->golongan?->name,
            "eselon" => $this->eselon?->name,
            "position" => $this->position?->name,
            "work_place" => $this->workPlace?->name,
            "religion" => $this->religion->name,
            "work_unit" => $this->workUnit?->name,
            "phone_number" => $this->phone_number,
            "npwp" => $this->npwp,
        ];
    }
}
