<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Enums\CommentStatusEnum;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedTinyInteger('status_id')->default(CommentStatusEnum::unseen->value)->after('status');
            $this->changeStatus();
            $table->softDeletes();
            $table->dropColumn('status');
        });
    }
    public function changeStatus(): void
    {
        DB::table('comments')->update([
            'status_id' => DB::raw('CASE status WHEN "unseen" THEN ' . CommentStatusEnum::unseen->value . ' WHEN "approved" THEN ' . CommentStatusEnum::approved->value . ' WHEN "seen" THEN ' . CommentStatusEnum::seen->value . ' END')]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->enum('status', ['approved', 'unseen', 'seen'])->default('unseen');
            $table->dropColumn('status_id');
        });
    }
};
