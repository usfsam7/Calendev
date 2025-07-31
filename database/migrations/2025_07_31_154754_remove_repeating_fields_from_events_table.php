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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['parent_event_id']);
            $table->dropColumn(['repeat_type', 'repeat_interval', 'repeat_until', 'parent_event_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->enum('repeat_type', ['none', 'daily', 'weekly', 'monthly', 'yearly'])->default('none');
            $table->integer('repeat_interval')->default(1);
            $table->date('repeat_until')->nullable();
            $table->unsignedBigInteger('parent_event_id')->nullable();
            $table->foreign('parent_event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }
};
