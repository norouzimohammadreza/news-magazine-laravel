<?php

namespace App\Http\Resources\API\Admin\Posts;

use App\Http\Resources\API\Admin\Users\UserDetailesApiResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostDetailsApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'summary' => $this->summary,
            'body' => $this->body,
            'view' => $this->view,
            'arthur' => new UserDetailesApiResource($this->user),
            'published' => $this->published_at,
            'comments' => Comment::where('post_id', $this->id)->count()
        ];
    }
}
