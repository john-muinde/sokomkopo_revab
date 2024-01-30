<?php

function send_sms($number, $message)
{
    $authEndpoint = 'https://accounts.jambopay.com/auth/token';
    $smsEndpoint = 'https://swift.jambopay.co.ke/api/public/send';
    $clientId = 'PiBcI5+58I7OA193g+ViPI+e9SNOfrjbBXmYocYvAUs=';
    $clientSecret = '796b2b80-bc94-45bc-9546-14ee2e7cc7bebJg5ZlK2U3F3kMg0EXv3xpH+M/bEz1NSvgDxTgNuIdY=';

    // Get access token
    $authToken = getAccessToken($clientId, $clientSecret, $authEndpoint);

    if ($authToken !== null) {
        // Send SMS
        $smsData = array(
          'contact' => $number,
          'message' => $message,
          'callback' => 'https://sokomkopo.veseninternal.co.ke/api/callback.php',
          'sender_name' => 'jambopay'
        );

        $smsHeaders = array(
          'Authorization: Bearer ' . $authToken,
          'Content-Type: application/json'
        );

        $smsResponse = makeCurlRequest(
            'POST',
            $smsEndpoint,
            json_encode($smsData),
            $smsHeaders
        );
        $smsStatusCode = $smsResponse['statusCode'];
        $smsResult = $smsResponse['response'];

        return array(
          'response' => $smsResult,
          'status_code' => $smsStatusCode
        );
    } else {
        return array(
          'response' => null,
          'status_code' => 401
        );
    }
}
