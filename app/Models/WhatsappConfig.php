<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappConfig extends Model
{
    protected $table = 'whatsapp_configs';

    protected $fillable = [
        'country',
        'country_code',
        'phone_number',
        'message',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function getConfigByCountry($country)
    {
        return self::where('country', $country)
            ->where('is_active', true)
            ->first();
    }

    public static function getConfigByCode($countryCode)
    {
        return self::where('country_code', $countryCode)
            ->where('is_active', true)
            ->first();
    }
}
