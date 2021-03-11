<?php

$data = array("service_name" => "getMeasurementType");
$data_string = json_encode($data);

$ch = curl_init("https://airsel-rfid-api.pipe.my/v1/wams/services/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
   'Content-Type: application/json'
));

$result = curl_exec($ch);
echo $result;