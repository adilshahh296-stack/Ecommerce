<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('whatsapp_configs', function (Blueprint $table) {
            $table->id();
            $table->string('country')->unique(); // Malaysia, Oman, Qatar, Kuwait, Bahrain
            $table->string('country_code'); // MY, OM, QA, KW, BH
            $table->string('phone_number'); // WhatsApp number with country code
            $table->text('message')->nullable(); // Default message template
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('whatsapp_configs');
    }
};
