<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SignInUserResource extends JsonResource
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
            'name'          => $this->name,
            'nickname'      => $this->nickname,
            'date_of_birth' => $this->date_of_birth
        ];
    }
}
