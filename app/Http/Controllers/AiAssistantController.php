<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class AiAssistantController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'min:2', 'max:1500'],
        ]);

        $key = 'ai-setia:'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 12)) {
            return response()->json(['message' => 'Terlalu banyak permintaan. Coba lagi sebentar.'], 429);
        }
        RateLimiter::hit($key, 60);

        $apiKey = config('services.ai_setia.key');
        $baseUrl = rtrim((string) config('services.ai_setia.base_url'), '/');
        $model = config('services.ai_setia.model');

        if (!$apiKey || !$baseUrl || !$model) {
            return response()->json([
                'reply' => 'AI Setia belum dikonfigurasi. Untuk sementara, gunakan pencarian katalog atau pilih kategori layanan yang sesuai.',
                'configured' => false,
            ]);
        }

        try {
            $response = Http::withToken($apiKey)->acceptJson()->timeout(20)->post($baseUrl.'/chat/completions', [
                'model' => $model,
                'messages' => [
                    ['role' => 'system', 'content' => 'Kamu adalah AI Setia, asisten marketplace jasa digital Indonesia. Bantu pengguna menemukan jasa coding, website, desain, konsultasi IT, belajar, dokumentasi, dan teman curhat umum. Jawab bahasa Indonesia, ramah, ringkas, tidak mengaku sebagai psikolog atau tenaga medis, dan jangan menjanjikan hasil layanan.'],
                    ['role' => 'user', 'content' => $validated['message']],
                ],
                'temperature' => 0.6,
            ]);

            if (!$response->successful()) {
                return response()->json(['reply' => 'Layanan AI sedang tidak tersedia. Silakan coba lagi atau cari layanan lewat katalog.', 'configured' => true], 502);
            }

            return response()->json([
                'reply' => data_get($response->json(), 'choices.0.message.content', 'Maaf, AI belum dapat memberi jawaban.'),
                'configured' => true,
            ]);
        } catch (\Throwable $exception) {
            report($exception);

            return response()->json(['reply' => 'Koneksi AI belum berhasil. Coba lagi beberapa saat lagi.', 'configured' => true], 502);
        }
    }
}
