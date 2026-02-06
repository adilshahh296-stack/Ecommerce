<?php

namespace App\Http\Controllers;

use App\Models\WhatsappConfig;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WhatsappController extends Controller
{
    /**
     * Get WhatsApp config based on user's country
     */
    public function getConfig(Request $request): JsonResponse
    {
        $country = $request->input('country') ?? 'Malaysia';
        $config = WhatsappConfig::getConfigByCountry($country);

        if (!$config) {
            return response()->json(['error' => 'No WhatsApp config found'], 404);
        }

        return response()->json([
            'phone' => $config->phone_number,
            'message' => $config->message ?? 'Hello! I would like to inquire about your products.',
            'country' => $config->country,
            'whatsapp_link' => $this->generateWhatsAppLink($config->phone_number, $config->message)
        ]);
    }

    /**
     * Generate WhatsApp link
     */
    public function generateWhatsAppLink($phoneNumber, $message = ''): string
    {
        $encoded_message = urlencode($message ?? 'Hello! I would like to know more about your products.');
        return "https://wa.me/{$phoneNumber}?text={$encoded_message}";
    }

    /**
     * Detect user's country from IP
     */
    public function detectCountry(Request $request): JsonResponse
    {
        // Simple mapping based on user input or geolocation
        // In production, use GeoIP library for better accuracy
        $countries = ['Malaysia', 'Oman', 'Qatar', 'Kuwait', 'Bahrain'];
        
        $country = $request->input('country', 'Malaysia');
        
        if (!in_array($country, $countries)) {
            $country = 'Malaysia'; // default
        }

        $config = WhatsappConfig::getConfigByCountry($country);

        return response()->json([
            'detected_country' => $country,
            'phone' => $config->phone_number ?? null,
            'message' => $config->message ?? null,
        ]);
    }

    /**
     * Store admin WhatsApp configurations
     */
    public function storeConfig(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'country' => ['required', 'string'],
            'country_code' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'regex:/^\+?[0-9]{10,15}$/'],
            'message' => ['nullable', 'string', 'max:500'],
            'is_active' => ['boolean'],
        ]);

        $config = WhatsappConfig::updateOrCreate(
            ['country' => $validated['country']],
            $validated
        );

        return response()->json(['success' => true, 'data' => $config]);
    }
}
