<?php

function displayErrorToast($errorMessage)
{
    if (isset($_SESSION['error_message']) && $_SESSION['error_message'] === $errorMessage) {
        // Error message has already been displayed, unset it
        unset($_SESSION['error_message']);
        return;
    }

    $_SESSION['error_message'] = $errorMessage;
    echo <<<HTML
        <div id="error-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
          <div class="toast-header bg-danger text-white">
            <strong class="mr-auto">Error</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            $errorMessage
          </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#error-toast').toast('show');
            });
        </script>
    HTML;
}


function makeCurlRequest($method, $url, $postFields = null, $headers = array())
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => $method,
      CURLOPT_POSTFIELDS => $postFields,
      CURLOPT_HTTPHEADER => $headers,
    ));

    $response = curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    return array(
      'statusCode' => $statusCode,
      'response' => $response
    );
}

include_once 'operations.php';

function getAccessToken($clientId, $clientSecret, $authEndpoint)
{
    $postData = 'grant_type=client_credentials&client_id=' . urlencode($clientId) . '&client_secret=' . urlencode($clientSecret);
    $headers = array('Content-Type: application/x-www-form-urlencoded');
  
    $response = makeCurlRequest('POST', $authEndpoint, $postData, $headers);
  
    if ($response['statusCode'] === 200) {
        $accessToken = json_decode($response['response'])->access_token;
        return $accessToken;
    } else {
        return null;
    }
}


function roundOff($number, $decimals = 2)
{
    $roundedNumber = round((float) $number, $decimals);
    return (float) number_format($roundedNumber, $decimals, '.', '');
}
