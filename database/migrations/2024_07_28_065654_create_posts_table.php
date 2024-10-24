<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\PostStatusEnum;
use App\Enums\PostBreakingNewsEnum;
use App\Enums\PostSelectedEnum;
return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {

            $table->innoDb();
            $table->id();
            $table->string('title', 100);
            $table->text('summary');
            $table->text('body');
            $table->text('image');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->integer('view')->default(0);
            $table->boolean('status')->default(PostStatusEnum::visible->value);
            $table->boolean('selected')->default(PostSelectedEnum::notSelected->value);
            $table->boolean('breaking_news')->default(PostBreakingNewsEnum::notBreakingNews->value);
            $table->timestamp('published_at');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
