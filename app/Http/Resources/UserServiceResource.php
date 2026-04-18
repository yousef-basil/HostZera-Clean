<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserServiceResource extends JsonResource
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
            'whmcs_id' => $this->whmcs_id,
            'status' => $this->status,
            'next_due_date' => $this->next_due_date,
            'service' => new ServiceResource($this->whenLoaded('service')),
        ];
    }
}
