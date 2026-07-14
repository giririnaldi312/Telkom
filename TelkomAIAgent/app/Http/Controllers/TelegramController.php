<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\Site;
use App\Models\MaintenanceLog;
use App\Models\AuthorizedUser;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        // Simpan request ke log Laravel
        Log::info($request->all());

        // Data Telegram
        $chatId = $request->input('message.chat.id');
        $text = strtoupper(trim($request->input('message.text')));

        $senderName = $request->input('message.from.first_name');
        $username = $request->input('message.from.username');
        $telegramId = $request->input('message.from.id');

        // Cek apakah user memiliki akses
        $user = AuthorizedUser::where('telegram_id', $telegramId)
            ->where('is_active', true)
            ->first();

        if (!$user) {

            $reply = "❌ Anda tidak memiliki izin menggunakan bot ini.\nSilakan hubungi Administrator.";

            // Simpan log akses ditolak
            MaintenanceLog::create([
                'site_id'      => '-',
                'sender_name'  => $senderName,
                'username'     => $username,
                'telegram_id'  => $telegramId,
                'message'      => $text,
                'response'     => $reply,
                'status'       => 'UNAUTHORIZED',
            ]);

            Http::post(
                "https://api.telegram.org/bot" . config('services.telegram.token') . "/sendMessage",
                [
                    "chat_id" => $chatId,
                    "text" => $reply,
                ]
            );

            return response()->json([
                'success' => false
            ]);
        }

        if (!$chatId || !$text) {
            return response()->json([
                'success' => false
            ]);
        }

        // Cari Site berdasarkan Site ID
        $site = Site::where('site_id', ltrim($text, '/'))->first();

        if ($site) {

            $reply =
                "📡 SITE ID : /{$site->site_id}\n\n" .
                "📍 Nama Site : {$site->site_name}\n" .
                "🌍 Region : {$site->region}\n" .
                "📊 Status : {$site->status}\n\n" .
                "📝 {$site->note}";

            $status = "SUCCESS";
        } else {

            $reply = "❌ Site ID tidak ditemukan.";

            $status = "FAILED";
        }

        // ==========================
        // SIMPAN KE DATABASE
        // ==========================

        MaintenanceLog::create([

            'site_id' => $site ? $site->site_id : '-',

            'sender_name' => $senderName,

            'username' => $username,

            'telegram_id' => $telegramId,

            'message' => $text,

            'response' => $reply,

            'status' => $status,

        ]);

        // ==========================
        // KIRIM BALASAN KE TELEGRAM
        // ==========================

        Http::post(
            "https://api.telegram.org/bot" .
                config('services.telegram.token') .
                "/sendMessage",
            [
                "chat_id" => $chatId,
                "text" => $reply,
            ]
        );

        return response()->json([
            'success' => true
        ]);
    }
}
