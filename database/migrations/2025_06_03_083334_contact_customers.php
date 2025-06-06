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
        Schema::create('contact_customers', function (Blueprint $table) {
    $table->id();
    $table->foreignId('contact_id')->constrained('contacts');
    $table->foreignId('customer_id')->constrained('customers');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_customers');
    }
};
