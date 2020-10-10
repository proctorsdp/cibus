<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Unit extends JsonResource
{
    public static $wrap = 'unit';

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
            'symbol' => $this->symbol,
            'unit_of' => new UnitOf($this->unitOf),
            'system' => new System($this->system),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
