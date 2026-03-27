<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('master_traders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar_bg_color')->default('1d5053'); // For dynamic UI Avatars
            $table->decimal('monthly_roi', 8, 2); // e.g., 45.2
            $table->integer('followers_count');
            $table->integer('win_rate'); // e.g., 88
            $table->integer('risk_score'); // 1 to 10
            $table->boolean('is_verified')->default(false);
            $table->date('since_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('master_traders');
    }
};
