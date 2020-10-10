<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DirectionIngredient extends JsonResource
{
    public static $wrap = 'direction_ingredient';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'direction_id' => $this->pivot->direction_id,
            'quantity' => $this->pivot->quantity,
            'unit' => new Unit($this->pivot->unit),
            'ingredient' => new Ingredient($this->pivot->ingredient),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
