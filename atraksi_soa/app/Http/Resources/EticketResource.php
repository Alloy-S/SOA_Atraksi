<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EticketResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'paket_id' => $this->paket_id,
            'jml_ticket' => $this->jml_ticket,
            'booking_code' => $this->booking_code,
        ];
    }
}
