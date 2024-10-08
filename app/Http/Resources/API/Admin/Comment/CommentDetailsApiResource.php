<?php

namespace App\Http\Resources\API\Admin\Comment;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentDetailsApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'body'=> $this->body,
        'user'=> $this->user->name,
        'post'=> $this->post->title,
        'status'=>$this->status
    ];
    }
}
