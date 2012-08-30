<?php
$options = array  
( 
    CURLOPT_URL            => $_POST["server"], 
    CURLOPT_POSTFIELDS     => $_POST["request"], 
    CURLOPT_POST           => true, 
    CURLOPT_RETURNTRANSFER => true 
); 
$curl = curl_init(); 
curl_setopt_array($curl, $options); 
$response = curl_exec($curl); 
echo curl_error($curl);
curl_close($curl); 
echo $response;
