<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('copy_connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('master_trader_id')->constrained('master_traders')->cascadeOnDelete();
            $table->decimal('invested_amount', 10, 2);
            $table->string('multiplier'); // e.g., "1.0x (Proportional)"
            $table->decimal('net_profit', 10, 2)->default(0);
            $table->enum('status', ['active', 'paused'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('copy_connections');
    }
};
