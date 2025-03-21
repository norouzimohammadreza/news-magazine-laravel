<?php

namespace App\Http\Resources\API\Admin\Menus;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenusListApiResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'url' => $this->url,
            'parent_id' => $this->parent_id
        ];
    }
}
