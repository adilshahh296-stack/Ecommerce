<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Make price columns nullable
            if (Schema::hasColumn('order_items', 'price')) {
                $table->decimal('price', 10, 2)->nullable()->change();
            }
            if (Schema::hasColumn('order_items', 'total_price')) {
                $table->decimal('total_price', 10, 2)->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            if (Schema::hasColumn('order_items', 'price')) {
                $table->decimal('price', 10, 2)->nullable(false)->change();
            }
            if (Schema::hasColumn('order_items', 'total_price')) {
                $table->decimal('total_price', 10, 2)->nullable(false)->change();
            }
        });
    }
};
