<?php
namespace App\Communicate;

class Firebase
{
    
    // sending push message to single user by firebase reg id
    public static function send($to, $message, $notification)
    {
        if (! $to || ! $message) return false;
        
        $fields = array(
            'to'   => $to,
            'notification' => $notification,
            'data' => array('message' => $message),
        );
        
        return Firebase::sendPushNotification($fields);
    }
    
    // Sending message to a topic by topic name
    
    public static function sendPushNotification($fields)
    {
        
        // Set POST variables
        $url = 'https://fcm.googleapis.com/fcm/send';
        
        $firebase_key = env("FIREBASE_API_KEY");
        
        $headers = array(
            'Authorization: key=' . $firebase_key,
            'Content-Type: application/json'
        );
        // Open connection
        $ch = curl_init();
        
        // Set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        
        // Execute post
        $result = curl_exec($ch);
        if ($result === false) {
            die('Curl failed: ' . curl_error($ch));
        }
        
        // Close connection
        curl_close($ch);
        
        return $result;
    }
    
    // sending push message to multiple users by firebase registration ids
    
    public static function sendToTopic($to, $message, $notification)
    {
        $fields = array(
            'to'   => '/topics/' . $to,
            'notification' => $notification,
            'data' => array('message' => $message),
        );
        
        return Firebase::sendPushNotification($fields);
    }
    
    // static function makes curl request to firebase servers
    
    public static function sendMultiple($registration_ids, $message, $notification)
    {
        $fields = array(
            'registration_ids' => $registration_ids,
            'notification' => $notification,
            'data'             => array('message' => $message),
        );
        
        return Firebase::sendPushNotification($fields);
    }
}

class FirebaseNotification {
    public $title;
    public $text;
    public $badge; 
    public $sound = 'default';

    public function __construct($title, $text, $badge = 1) {
        $this->title = $title;
        $this->text = $text;
        $this->badge = $badge;
    }

    public function toArray () {
        return get_object_vars($this);
    }
}