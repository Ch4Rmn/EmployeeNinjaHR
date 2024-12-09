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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            // 'email_verified_at' => $this->email_verified_at,
            'employee_id' => $this->employee_id,
            'department_id' => $this->department_id,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'address' => $this->address,
            'nrc_number' => $this->nrc_number,
            'birthday' => $this->birthday,
            'date_of_join' => $this->date_of_join,
            'is_present' => $this->is_present,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ];
    }
}
