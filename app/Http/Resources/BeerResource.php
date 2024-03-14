<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Brewery;
use App\Models\Color;

class BeerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'color' => [
                'id' => $this->color->id,
                'name' => $this->color->color
            ],
            'brewery' => [
                'id' => $this->brewery->id,
                'name' => $this->brewery->name
            ]
            //'brewery' => BreweryResource::make(Brewery::find($this->brewery_id))
        ];
    }
}
