<?php

$sms = 'Your SMS Text Here';


$tokenSMS= "8|3JT4MKjqFnsNbKVSrgNIZL7sP4BG0BAbzulIQC7v";  // this is API Token Provided by EPOINT TECHNOLOGIES

$toNumber = "01611657039"; //its example phone number

 

$postData = [ "sms" => $sms,
    "number" => $toNumber,
];


//now sent message
$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "http://bulk-sms.epoint.com.bd/api/v1/sms/send",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => false,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS => json_encode($postData),
CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer $tokenSMS",
      "Accept: application/json",
      "Content-Type: application/json"
 ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

if ($response==1101){

    echo "SMS Has been Sent Successfully";

}else{

    echo "SMS Sending Failed";
}