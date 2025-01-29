<?php

use App\Models\DeviceDetail;
use Google\Auth\Credentials\ServiceAccountCredentials;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
class FirebaseNotificationService
{
  
    private function generateAccessToken()
    {
        if (Cache::has('firebase_access_token')) {
            return Cache::get('firebase_access_token');
        }
        try {
            $credentialsFilePath = storage_path('app/private/service_account.json');
            $credentials = new ServiceAccountCredentials(
                ['https://www.googleapis.com/auth/firebase.messaging'],
                $credentialsFilePath
            );
            $token = $credentials->fetchAuthToken();
            $accessToken = $token['access_token'];
            Cache::put('firebase_access_token', $accessToken, now()->addMinutes(55));
            return $accessToken;
        } catch (\Exception $e) {
            Log::error('Error generating access token: ' . $e->getMessage());
            return null;
        }
    }
  
    public function sendPushNotificationSync($to, $title, $body)
    {
        $access_token = $this->generateAccessToken();
        $devices = DeviceDetail::where('user_id', $to->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $fcmEndpoint = config('custom.fcm_endpoint');
        foreach ($devices as $device) {
            if (!empty($device)) {
               
                try {
                    $message = [
                        'message' => [
                            'token' => $device->device_token,
                            'notification' => [
                                'title' => $title,
                                'body'  => $body
                            ]
                        ]
                    ];
                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $access_token,
                        'Content-Type' => 'application/json',
                    ])->post($fcmEndpoint, $message); 
                    if ($response->status() == 200) {
                        Log::info('Notification sent successfully: ' . $response->body());
                    } else {
                        Log::error('Error sending FCM notification: ' . $response->body());
                    }
                } catch (\Exception $e) {
                    Log::error('Error sending FCM notification: ' . $e->getMessage());
                }
            }
        }
    }
}