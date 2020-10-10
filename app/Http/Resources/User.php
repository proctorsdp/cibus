<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Recipe as RecipeResource;

class User extends JsonResource
{
    public static $wrap = 'user';

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
            'name' => $this->name,
            'num_ratings' => count($this->reviews),
            'num_recipes' => count($this->submissions),
            'member_since' => $this->created_at,
            'submissions' => RecipeResource::collection($this->whenLoaded('submissions'))
        ];
    }
}
