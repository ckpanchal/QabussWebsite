<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAAMGVy6U0:APA91bGbrwpcOxzWGkNYEgqGFnDKKbc2EZjaI1_w71lCjb00XDe-8zzDmh8ZowLnKU60ay4Mwtcj37KIUE04qJrVbU2P1NOnziKBz_MMhCfksQ2rTrWGbCWnCzER-tQAJEsXmufueHJP'),
        'sender_id' => env('FCM_SENDER_ID', '207860459853'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];