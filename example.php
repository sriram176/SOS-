<?php
/*$url = 'https://rest.nexmo.com/sms/json?' . http_build_query([
    'api_key' => 62186ddc,
    'api_secret' => fae24bdbdad634a8,
    'to' => 917013267426,
    'from' => NEXMO_NUMBER,
    'text' => 'Hello from Nexmo'
]);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
?>*/

function sendmsg($msg){
    $sms = str_replace(' ', '+', $msg);
    // send message
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://rest.nexmo.com/sms/json?api_key=62186ddc&api_secret=fae24bdbdad634a8&to=917013267426&from=VIRTUALNUMBER&text=".$sms);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
    print $result;
}

$m = mt_rand(1000,10000);
sendmsg($m);

?>
