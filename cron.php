<?php
$calenderId  = 'nikulpanchal0011@gmail.com';
$apiKey      = 'AIzaSyCcLTTDtC2wPIXLiRT62igEOvD8_xVhzmw';


// $data = array("application_name" => "Application1");
$apiurl ='https://www.googleapis.com/calendar/v3/calendars/'.$calenderId.'/events?key='.$apiKey;
// $data_array = json_encode( $data );
$curl    = curl_init();
curl_setopt( $curl, CURLOPT_URL, $apiurl );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
// curl_setopt( $curl, CURLOPT_POSTFIELDS, $data_array );
curl_setopt( $curl, CURLOPT_HTTPHEADER, array( 'Content-Type: application/json' ) );
$result = curl_exec( $curl );
$eventData = json_decode( $result, true )['items'];

// echo '<pre>';
// print_r($eventData);
// die;

if(!empty($eventData)) {
	foreach($eventData as $key => $value) {
		if(isset($value['start']['dateTime'])) {
			$summary = $value['summary'];
			$timezone = $value['start']['timeZone'];
			$starttime = $value['start']['dateTime'];
			$starttime = date("Y-m-d H:i:s",strtotime($starttime));
			$utctime = gmdate("Y-m-d H:i:s"); 
			$start_date = new DateTime($starttime);
			$since_start = $start_date->diff(new DateTime($utctime));
			$minutes = $since_start->days * 24 * 60;
			$minutes += $since_start->h * 60;
			$minutes += $since_start->i;
			if($minutes <= 5 || 1==1) {
				$pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
		  			"instanceId" => "526a07fe-587f-4002-9db8-62dc54ffb6be",
		  			"secretKey" => "DD6AF1EC0570578CADC2CC05FE7B61C0FEE131B4CE567D128FCB70CF265E4B1E",
				));
				$ch = curl_init();

				curl_setopt($ch, CURLOPT_URL, 'https://526a07fe-587f-4002-9db8-62dc54ffb6be.pushnotifications.pusher.com/publish_api/v1/instances/526a07fe-587f-4002-9db8-62dc54ffb6be/publishes');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"interests\":[\"123\"],\"web\":{\"notification\":{\"title\":\"testdfdf\",\"body\":\"Hello, world!\"}}}");

				$headers = array();
				$headers[] = 'Content-Type: application/json';
				$headers[] = 'Authorization: Bearer DD6AF1EC0570578CADC2CC05FE7B61C0FEE131B4CE567D128FCB70CF265E4B1E';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

				$result = curl_exec($ch);
				if (curl_errno($ch)) {
				    echo 'Error:' . curl_error($ch);
				}
				curl_close($ch);
			}
			
		}
		
	}	
}
