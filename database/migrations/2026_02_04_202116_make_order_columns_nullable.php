<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Make these columns nullable since we are using shipping_address instead
            if (Schema::hasColumn('orders', 'city')) {
                $table->string('city')->nullable()->change();
            }
            if (Schema::hasColumn('orders', 'postal_code')) {
                $table->string('postal_code')->nullable()->change();
            }
            if (Schema::hasColumn('orders', 'country')) {
                $table->string('country')->nullable()->change();
            }
            if (Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'city')) {
                $table->string('city')->nullable(false)->change();
            }
            if (Schema::hasColumn('orders', 'postal_code')) {
                $table->string('postal_code')->nullable(false)->change();
            }
            if (Schema::hasColumn('orders', 'country')) {
                $table->string('country')->nullable(false)->change();
            }
            if (Schema::hasColumn('orders', 'notes')) {
                $table->text('notes')->nullable(false)->change();
            }
        });
    }
};
