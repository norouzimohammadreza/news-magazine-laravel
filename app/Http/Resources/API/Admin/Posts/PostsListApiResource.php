<?php

namespace App\Http\Resources\API\Admin\Posts;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostsListApiResource extends JsonResource
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
            'summary' => $this->summary,
            'view' => $this->view,
            'arthur' => $this->user->name,
            'published' => $this->published_at,
            'comments' => Comment::where('post_id', $this->id)->count()
        ];
    }
}
