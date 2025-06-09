<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_inquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('service_category_id')->nullable()->constrained('service_categories')->onDelete('set null');
            $table->text('message');
            $table->enum('status', ['new', 'contacted', 'quoted', 'booked', 'closed'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('created_at');
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_inquiries');
    }
};
