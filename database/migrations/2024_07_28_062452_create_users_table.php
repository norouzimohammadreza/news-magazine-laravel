<?php

use App\Enums\UserActiveEnum;
use App\Enums\UserPermissionEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->innoDb();
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->rememberToken();
            $table->boolean('is_admin')->default(UserPermissionEnum::user->value);
            $table->boolean('is_active')->default(UserActiveEnum::inActive->value);
            $table->string('verify_token', 255)->nullable();
            $table->string('forget_token', 255)->nullable();
            $table->string('forget_token_expire', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

    }
};
