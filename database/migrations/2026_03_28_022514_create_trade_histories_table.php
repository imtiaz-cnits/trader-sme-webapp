<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('master_trader_id')->constrained('master_traders')->cascadeOnDelete();
            $table->string('symbol'); // e.g., XAUUSD
            $table->enum('type', ['BUY', 'SELL']);
            $table->decimal('lot', 8, 2);
            $table->decimal('entry_price', 10, 5);
            $table->decimal('close_price', 10, 5)->nullable();
            $table->decimal('net_profit', 10, 2)->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamp('opened_at')->useCurrent();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trade_histories');
    }
};
