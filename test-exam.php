<?php

  $ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $data = curl_exec($ch);
  curl_close($ch);


	$decode_data = json_decode($data, true);
	
  $serialized_data = !empty($decode_data) && is_array($decode_data) ? $decode_data['data'] : null;

  $serialized_data = !empty($serialized_data) ? explode(",", $serialized_data) : null;
  
  // print_r($serialized_data);
// 	die;

  $count = 0;
  if (!empty($serialized_data)) {

    for($i = 0; $i < count($serialized_data); $i++) {
        $item = explode("=", $serialized_data[$i]);

        // Age key is the ket that not divided by 2
        if (trim($item[0]) == 'age' && $item[1] % 2 == 1 && $item[1] >= 50) {
          // echo $item[0] . " - " . $item[1];
          $count++;
        }
    }

  }

  print_r($count . ":pc6h0ilxw347");