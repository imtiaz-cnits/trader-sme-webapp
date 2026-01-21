<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('trade_logs', function (Blueprint $table) {
            $table->id();

            // 👇 Add the user_id column first
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->date('date_of_operation')->nullable();
            $table->string('trading_session')->nullable();
            $table->string('financial_instrument')->nullable();
            $table->string('lot_size')->nullable();
            $table->string('position_type')->nullable();
            $table->string('risk_benefit_metrics')->nullable();
            $table->string('entry_time')->nullable();
            $table->string('exit_time')->nullable();
            $table->string('outcome')->nullable();
            $table->decimal('gross_profit', 15, 2)->nullable();
            $table->text('commission_details')->nullable();
            $table->decimal('net_profit', 15, 2)->nullable();
            $table->string('trade_image_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_logs');
    }
};
