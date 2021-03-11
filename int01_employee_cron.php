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

echo " -- " . $curr . " -- hour = " . $hour . " -- " . $minute;
echo "----------".date(DATE_ATOM, mktime($hour, $minute, $second, $month, $day, $year))."----------";

// // dd/mm/YY H:M:S    /// 2017-01-12T14:12:06.000-0500
// $from_date = now.strftime("%Y-%m-%dT%H:00:00+00:00");
// $to_date = now.strftime("%Y-%m-%dT%H:59:59+00:00");

// $from_date1 = "2020-01-01T00:00:00+00:00";
// $to_date1 = "2020-03-10T59:59:59+00:00";

$from_date = date(DATE_ATOM, mktime($hour, 0, 0, $month, $day, $year));
$to_date = date(DATE_ATOM, mktime($hour, 59, 59, $month, $day, $year));

// echo "from_date = ".$from_date." -  to - ".$to_date;
// $data1 = array(
//    "service_name" => "getEmployee",
//    "from_date" => $from_date1,
//    "to_date" => $to_date1
// );
// print_r($data1);
// echo "-------------------------------------------------------";
// $data = array("service_name" => "getMeasurementType");
$data = array(
   "service_name" => "getEmployee",
   "from_date" => $from_date,
   "to_date" => $to_date
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
