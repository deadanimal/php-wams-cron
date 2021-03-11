<?php
//Set the default timezone to UTC.
date_default_timezone_set('UTC');
$curr = date("d-m-Y h:i:s");
$year = date("Y");
$month = date("m");
$day = date("d");
$hour = date("h");
$minute = date("i");
$second = date("i");

$from_date = date(DATE_ATOM, mktime($hour, 0, 0, $month, $day, $year));
$to_date = date(DATE_ATOM, mktime($hour, 59, 59, $month, $day, $year));

$data = array(
   "service_name" => "getServiceHistoryType"
//    "from_date" => $from_date,
//    "to_date" => $to_date
);

print_r($data);

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
