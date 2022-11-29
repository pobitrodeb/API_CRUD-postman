<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id, 
            'title'         => $this->title, 
            'author'        => $this->author, 
            'publisher'     => $this->publisher, 
            'created_at'    => $this->created_at, 
            'deleted_at'    => $this->deleted_at, 
        ];
    }
}
