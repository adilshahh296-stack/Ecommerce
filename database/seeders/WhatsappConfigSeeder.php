<?php

namespace Database\Seeders;

use App\Models\WhatsappConfig;
use Illuminate\Database\Seeder;

class WhatsappConfigSeeder extends Seeder
{
    public function run(): void
    {
        $configs = [
            [
                'country' => 'Malaysia',
                'country_code' => 'MY',
                'phone_number' => '+60123456789',
                'message' => 'Hello! I\'m interested in your products from Bright Max Trading. Please help me with more information.',
                'is_active' => true,
            ],
            [
                'country' => 'Oman',
                'country_code' => 'OM',
                'phone_number' => '+96891234567',
                'message' => 'مرحبا! أنا مهتم بمنتجاتك من Bright Max Trading. هل يمكنك مساعدتي بمزيد من المعلومات؟',
                'is_active' => true,
            ],
            [
                'country' => 'Qatar',
                'country_code' => 'QA',
                'phone_number' => '+97433456789',
                'message' => 'مرحبا! أنا مهتم بمنتجاتك من Bright Max Trading. هل يمكنك مساعدتي بمزيد من المعلومات؟',
                'is_active' => true,
            ],
            [
                'country' => 'Kuwait',
                'country_code' => 'KW',
                'phone_number' => '+96561234567',
                'message' => 'مرحبا! أنا مهتم بمنتجاتك من Bright Max Trading. هل يمكنك مساعدتي بمزيد من المعلومات؟',
                'is_active' => true,
            ],
            [
                'country' => 'Bahrain',
                'country_code' => 'BH',
                'phone_number' => '+97333456789',
                'message' => 'مرحبا! أنا مهتم بمنتجاتك من Bright Max Trading. هل يمكنك مساعدتي بمزيد من المعلومات؟',
                'is_active' => true,
            ],
        ];

        foreach ($configs as $config) {
            WhatsappConfig::create($config);
        }
    }
}
