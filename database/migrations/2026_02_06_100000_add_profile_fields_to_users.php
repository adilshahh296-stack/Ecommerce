<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('email');
            $table->string('country')->nullable()->after('phone');
            $table->string('city')->nullable()->after('country');
            $table->text('address')->nullable()->after('city');
            $table->string('postal_code')->nullable()->after('address');
            $table->string('profile_photo')->nullable()->after('postal_code');
            $table->boolean('is_active')->default(true)->after('profile_photo');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'country', 'city', 'address', 'postal_code', 'profile_photo', 'is_active']);
        });
    }
};
