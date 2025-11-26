<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('policy_number')->unique();
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['Auto', 'Health', 'Life', 'Property']);
            $table->decimal('coverage_amount', 12, 2);
            $table->decimal('premium_amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['Active', 'Expired', 'Cancelled'])->default('Active');
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
