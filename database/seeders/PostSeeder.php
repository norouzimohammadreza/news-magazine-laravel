<?php

namespace Database\Seeders;

use App\Enums\PostBreakingNewsEnum;
use App\Enums\PostSelectedEnum;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createBreakNews(PostBreakingNewsEnum::notBreakingNews->value);
        $this->createBreakNews(PostBreakingNewsEnum::isBreakingNews->value);
        $this->createSelected(PostSelectedEnum::notSelected->value);
        $this->createSelected(PostSelectedEnum::isSelected->value);
    }

    public function createBreakNews(int $bool)
    {
        $break = Post::factory()->create([
            'breaking_news' => $bool
        ]);
        return $break;
    }

    public function createSelected(int $bool)
    {
        $selected = Post::factory()->create([
            'selected' => $bool
        ]);
        return $selected;
    }
}
