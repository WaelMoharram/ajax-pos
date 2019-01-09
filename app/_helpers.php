<?php


//Json array response
function responseJson($status,$msg,$data = NULL){
    $response = [
        'status' => $status,
        'message' => $msg,
        'data' => $data
    ];
    return response()->json($response);
}



// one signal notification code
function oneSignalNotification($audience = ['included_segments' => array('All')], $contents = ['en' => ''], $data = [])
{

    // audience include_player_ids
    $appId = ['app_id' => env('ONE_SIGNAL_APP_ID')];

    $fields = json_encode((array)$appId + (array)$audience + ['contents' => (array)$contents] + ['data' => (array)$data] + ['ios_badgeType' => 'Increase', 'ios_badgeCount' => 1] + ['headings' => ['en' => 'Mswrati مصوراتي']]);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . env('ONE_SIGNAL_KEY')));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

function days(){

    return [
        'saturday'=>'السبت',
        'sunday'=>'الأحد',
        'monday'=>'الأثنين',
        'tuesday'=>'الثلاثاء',
        'wednesday'=>'الأربعاء',
        'thursday'=>'الخميس',
        'friday'=>'الجمعه',
    ];

}

// Firebase notification code

function firebaseNotification($title,$body,$tokens,$click_action,$data = [])
{
// https://gist.github.com/rolinger/d6500d65128db95f004041c2b636753a
// API access key from Google FCM App Console
    // env('FCM_API_ACCESS_KEY'));

//    $singleID = 'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd';
//    $registrationIDs = array(
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd',
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd',
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd'
//    );
    $registrationIDs = $tokens;

// prep the bundle
// to see all the options for FCM to/notification payload:
// https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support

// 'vibrate' available in GCM, but not in FCM
    $fcmMsg = array(
        'body' => $body,
        'title' => $title,
        'click_action' =>$click_action,
        'sound' => "default",
        'color' => "#203E78"
    );
// I haven't figured 'color' out yet.
// On one phone 'color' was the background color behind the actual app icon.  (ie Samsung Galaxy S5)
// On another phone, it was the color of the app icon. (ie: LG K20 Plush)

// 'to' => $singleID ;      // expecting a single ID
// 'registration_ids' => $registrationIDs ;     // expects an array of ids
// 'priority' => 'high' ; // options are normal and high, if not set, defaults to high.
    $fcmFields = array(
        'registration_ids' => $registrationIDs,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $data
    );

    $headers = array(
        'Authorization: key='.env('FCM_API_ACCESS_KEY'),
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function firebaseNotificationRestaurant($title,$body,$tokens,$click_action,$data = [])
{
// https://gist.github.com/rolinger/d6500d65128db95f004041c2b636753a
// API access key from Google FCM App Console
    // env('FCM_API_ACCESS_KEY'));

//    $singleID = 'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd';
//    $registrationIDs = array(
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd',
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd',
//        'eEvFbrtfRMA:APA91bFoT2XFPeM5bLQdsa8-HpVbOIllzgITD8gL9wohZBg9U.............mNYTUewd8pjBtoywd'
//    );
    $registrationIDs = $tokens;

// prep the bundle
// to see all the options for FCM to/notification payload:
// https://firebase.google.com/docs/cloud-messaging/http-server-ref#notification-payload-support

// 'vibrate' available in GCM, but not in FCM
    $fcmMsg = array(
        'body' => $body,
        'title' => $title,
        'click_action' =>$click_action,
        'sound' => "default",
        'color' => "#203E78"
    );
// I haven't figured 'color' out yet.
// On one phone 'color' was the background color behind the actual app icon.  (ie Samsung Galaxy S5)
// On another phone, it was the color of the app icon. (ie: LG K20 Plush)

// 'to' => $singleID ;      // expecting a single ID
// 'registration_ids' => $registrationIDs ;     // expects an array of ids
// 'priority' => 'high' ; // options are normal and high, if not set, defaults to high.
    $fcmFields = array(
        'registration_ids' => $registrationIDs,
        'priority' => 'high',
        'notification' => $fcmMsg,
        'data' => $data
    );

    $headers = array(
        'Authorization: key='.env('FCM_API_ACCESS_KEY_RESTAURANT'),
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmFields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function getYoutubeId($url)
{
    /*
     Here is a sample of the URLs this regex matches: (there can be more content after the given URL that will be ignored)
     http://youtu.be/dQw4w9WgXcQ
     http://www.youtube.com/embed/dQw4w9WgXcQ
     http://www.youtube.com/watch?v=dQw4w9WgXcQ
     http://www.youtube.com/?v=dQw4w9WgXcQ
     http://www.youtube.com/v/dQw4w9WgXcQ
     http://www.youtube.com/e/dQw4w9WgXcQ
     http://www.youtube.com/user/username#p/u/11/dQw4w9WgXcQ
     http://www.youtube.com/sandalsResorts#p/c/54B8C800269D7C1B/0/dQw4w9WgXcQ
     http://www.youtube.com/watch?feature=player_embedded&v=dQw4w9WgXcQ
     http://www.youtube.com/?feature=player_embedded&v=dQw4w9WgXcQ
     It also works on the youtube-nocookie.com URL with the same above options.
     It will also pull the ID from the URL in an embed code (both iframe and object tags)
    */
    preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
    if (isset($match[1]))
    {
        return $match[1];
    }
    return "";
}
function checkPermission($permission){
    if (auth()->user()->canNot($permission) && Auth()->user()->restaurant_id != null){
        abort(404);
    }
}

function checkPermissionAdmin($permission){
    if (auth()->user()->canNot($permission)){
        abort(404);
    }
}

function facebookUserData($token){
    $curl = curl_init();
    $url='https://graph.facebook.com/me?fields=id,name,email,picture.width(500).height(500)&access_token='.$token.'';
    //$sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$request->phone.'&message='.$confirmation_code.'';



    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",

    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return json_decode($response);
    }

}

function CheckRestaurantApi($restaurant){
    if (!$restaurant || $restaurant == NULL) {
        return responseJson(0, trans('api.login.not_auth'));
    }elseif ($restaurant->restaurant_id != NULL){
        return responseJson(0, trans('api.login.not_auth'));
    }
}

function ConfirmationCodeSMSMISR($phone,$confirmation_code,$message=null){
    $curl = curl_init();
    if ($message == null){
        $sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$phone.'&message='.curl_escape($curl, 'Garsoncom confirmation code is : '.$confirmation_code.'').'';
    }else{
        $sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$phone.'&message='.curl_escape($curl, $message.' : '.$confirmation_code.'').'';
    }

    //$sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$request->phone.'&message='.$confirmation_code.'';



    curl_setopt_array($curl, array(
        CURLOPT_URL => $sms_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            // Set here requred headers
            "accept: */*",
            "accept-language: ar",
            "content-type: application/json",
            "Content-Length: 0",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

//    if ($err) {
//        return "cURL Error #:" . $err;
//    } else {
//        return $response;
//    }
}


function SMSMISR($phone,$message){
    $curl = curl_init();

    $sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile='.$phone.'&message='.curl_escape($curl, $message).'';


    //$sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$request->phone.'&message='.$confirmation_code.'';



    curl_setopt_array($curl, array(
        CURLOPT_URL => $sms_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            // Set here requred headers
            "accept: */*",
            "accept-language: ar",
            "content-type: application/json",
            "Content-Length: 0",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

//    if ($err) {
//        return "cURL Error #:" . $err;
//    } else {
//        return $response;
//    }
}


function VerifySMSMISR($phone,$confirmation_code,$message=null){
    $curl = curl_init();
    if ($message == null){
        $sms_url='https://smsmisr.com/api/verify/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&mobile=2'.$phone.'&message='.curl_escape($curl, 'Garsoncom confirmation code is : '.$confirmation_code.'').'';
    }else{
        $sms_url='https://smsmisr.com/api/verify/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&mobile=2'.$phone.'&message='.curl_escape($curl, $message.' : '.$confirmation_code.'').'';
    }

    //$sms_url='https://smsmisr.com/api/webapi/?username='.env('SMS_MISR_USERNAME').'&password='.env('SMS_MISR_PASSWORD').'&language=1&sender=Garsoncom&mobile=2'.$request->phone.'&message='.$confirmation_code.'';



    curl_setopt_array($curl, array(
        CURLOPT_URL => $sms_url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => array(
            // Set here requred headers
            "accept: */*",
            "accept-language: ar",
            "content-type: application/json",
            "Content-Length: 0",
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

//    if ($err) {
//        return "cURL Error #:" . $err;
//    } else {
//        return $response;
//    }
}

function createFreeMealPromoCode($client){
    $code = substr($client->name, 0, 2).'-20le-'.($client->id+1111);
    $create=\App\Models\PromotionCode::Create(['client_id'=>$client->id,'code'=>$code,'usage'=>NULL,'remaining'=>0,'discount'=>20,'discount_type'=>'amount','restaurant_percent'=>0,'app_percent'=>100,'min_order'=>20,'active'=>1,'time_from'=>$client->created_at,'time_to'=>'2030-12-31 00:00:00','roles'=>1]);
}

function dataInLog($data){
    unset($data['_token']);
    return json_encode($data);
}
