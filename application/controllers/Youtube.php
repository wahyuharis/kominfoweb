<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Youtube extends CI_Controller
{
    private $description = "";
    private $keywords = "";
    private $api_key = "AIzaSyAeOMg3BF6fAVenyx3UYMgSBnSVCyKiM5M";

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $html = "";

        $json = $this->api_excute();
        $json2 = $this->api_excute2();
        $array = json_decode($json, true);
        $array2 = json_decode($json2, true);

        // print_r2($json);

        if (isset($array['items'])) {

            $item = $array['items'];
            $item2 = $array2['items'];


            $html = "";

            $channel_id = "";
            if (isset($item2[0]['id'])) {
                $channel_id = $item2[0]['id'];
            }
            $logo = "";
            if (isset($item2[0]['snippet'])) {
                $logo = $item2[0]['snippet']['thumbnails']['high']['url'];
            }

            $html .= '<div class="row mb-10 ytb-row" style="display:none">' .
                '<div class="col-3">' .

                '<a href="https://www.youtube.com/channel/' . $channel_id . '" >' .
                '<img style="
                height: 70px;
                width: 70px;
                display: inline-block;
                border-radius: 50px;
                padding: 0;
                " src="' . $logo . '">' .
                '</a>'.


                '</div>' .
                '<div class="col-9">' .
                '<a href="https://www.youtube.com/channel/' . $channel_id . '" >' .
                '<i class="fab fa-youtube text-danger"></i> PEMKAB JEMBER' .
                '</a>'.
                '<br><a href="https://www.youtube.com/channel/' . $channel_id . '?sub_confirmation=1" class="genric-btn danger">' .
                '<i class="far fa-bell"></i> Subscribe</a>' .
                '</div>' .
                ' </div>';

            $html .= '<div class="row ytb-row" style="display:none">';
            foreach ($item as $row) {
                $html .= '<div class="col-6 mb-10">'
                    .'<a href="https://www.youtube.com/watch?v='. $row['id']['videoId'].'" >'
                    . '<img class="img-fluid" width="100%" src="' . $row['snippet']['thumbnails']['default']['url'] . '">'
                    .'</a>'
                    . '</div>';

            }
            $html .= '</div>';
            $html.='<script>
            $(".ytb-row").ready(function(){
                $(".ytb-row").fadeIn("slow");
            });
            </script>';
        }


        echo $html;
    }

    function api_excute()
    {
        $api_key = $this->api_key;
        $channel_id = 'UC4zRmZ8mI7OV9cL8MhroopA';
        $video_show = 6;
        $url = 'https://www.googleapis.com/youtube/v3/search?'
            . 'key=' . $api_key . '&'
            . 'channelId=' . $channel_id . '&'
            . 'part=snippet,id&order=date&maxResults=' . $video_show;

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    function api_excute2()
    {
        $api_key = $this->api_key;

        $channel_id = 'UC4zRmZ8mI7OV9cL8MhroopA';
        $url = "https://youtube.googleapis.com/youtube/v3/channels?part=snippet%2CcontentDetails%2Cstatistics&" .
            "id=" . $channel_id .
            "&key=" . $api_key;

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
