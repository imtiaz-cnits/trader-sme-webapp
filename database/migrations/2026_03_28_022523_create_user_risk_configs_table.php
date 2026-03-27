<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('user_risk_configs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->boolean('force_exit_drawdown')->default(true);
            $table->boolean('slippage_protection')->default(false);
            $table->boolean('copy_sl_tp')->default(true);
            $table->boolean('weekend_protection')->default(false);
            $table->decimal('max_daily_loss', 10, 2)->default(500.00);
            $table->integer('max_open_positions')->default(5);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_risk_configs');
    }
};
