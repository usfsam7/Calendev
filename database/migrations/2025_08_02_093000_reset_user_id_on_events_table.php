<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Step 1: Safely drop the foreign key and column if they exist
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });

    }

    public function down(): void
    {
     //
    }
};

