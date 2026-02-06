<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Make total nullable since we are using total_amount
            if (Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'total')) {
                $table->decimal('total', 10, 2)->nullable(false)->change();
            }
        });
    }
};
