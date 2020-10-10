<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Recipe extends JsonResource
{
    public static $wrap = 'recipe';

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
            'title' => $this->title,
            'description' => $this->description,
            'prep_time' => $this->time,
            'time_unit' => new Unit($this->time_unit),
            'author' => User::make($this->whenLoaded('author')),
            'directions' => new DirectionCollection($this->directions),
            'ingredients' => new IngredientCollection($this->ingredients),
            'tags' => new TagCollection($this->tags),
            'ratings' => new RatingCollection($this->ratings),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
