<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nom' => $this->name,  // Personnalisation : changer 'name' en 'nom'
            'type' => $this->type,
            'prix' => $this->formatted_price,  // Utilisation de l'accessor
            'statut' => ucfirst($this->status), // Formatage du statut
            'créé_le' => $this->created_at ? $this->created_at->format('d-m-Y') : null, // Date formatée
        ];
    }
}
