<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->name,
            'type' => $this->type,
            'prix' => $this->formatted_price,
            'statut' => ucfirst($this->status),
            'créé_le' => $this->created_at->format('d-m-Y'),
        ];
    }
}
