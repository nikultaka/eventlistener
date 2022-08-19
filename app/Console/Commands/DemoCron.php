<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $calenderId  = env("CALENDERID");
        $apiKey      = env("APIKEY");

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

                    //echo $minutes; 
                    //echo  '<br>';
                    if($minutes <= 5 && $utctime<=$starttime) {
                        $pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
                            "instanceId" => env("INSTANCEID"),
                            "secretKey" => env("SECRETKEY")
                        ));
                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, 'https://'.env("INSTANCEID").'.pushnotifications.pusher.com/publish_api/v1/instances/'.env("INSTANCEID").'/publishes');
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"interests":["hello"],"web":{"notification":{"title":"'.$summary.'","body":"'.$summary.'"}}}');

                        $headers = array();
                        $headers[] = 'Content-Type: application/json';
                        $headers[] = 'Authorization: Bearer '.env("SECRETKEY");
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
        return true;
    }
}
