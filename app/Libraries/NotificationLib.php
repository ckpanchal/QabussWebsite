<?php
namespace App\Libraries;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class NotificationLib{

    public function sendNotification($title,$titleAr,$message,$messageAr,$image,$type,$type_id,$data){
        $messaging = app('firebase.messaging');
        \App\Models\AppNotifications::create([
            'title'=>$title,
            'titleAr'=>$titleAr,
            'message'=>strip_tags($message),
            'messageAr'=>strip_tags($messageAr),
            'image'=>$image,
            'notification_type'=>$type,
            'notification_id'=>$type_id
        ]);
        $messageToSend = CloudMessage::withTarget('token','eouTeQolTEi2DEfS33PySO:APA91bHx4olGT8qU7d0f-I7ev7ltbwFGUHYYV09C0BsnougRaVHh4_YeeIzLIvDw8eT305ZdKgEThq_TIkZlViCh4nOP7OA-43vhOVd81Yqr6KJU_r_sleXsT0aBNO4wFtbHZFxeDFbO')
            ->withNotification(Notification::create($title, $message,$image))
            ->withData([
                'type'=>strval($type),
//                'data'=>json_encode($data->toArray()),
                'id'=>strval($type_id),
                'click_action'=> 'FLUTTER_NOTIFICATION_CLICK'
            ]);

        $tokens = \App\Models\FcmToken::pluck('token')->toArray();
        $sendReport = $messaging->sendMulticast($messageToSend,$tokens);
    }
}
