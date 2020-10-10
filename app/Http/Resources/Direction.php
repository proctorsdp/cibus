<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Direction extends JsonResource
{
    public static $wrap = 'direction';

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
            'recipe_id' => $this->recipe->id,
            'step' => $this->step_number,
            'text' => $this->text,
            'ingredients' => new DirectionIngredientCollection($this->ingredients),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
