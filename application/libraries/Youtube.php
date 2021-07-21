<?php

class Youtube
{

    private $video_show = "5";
    private $api_key = 'AIzaSyBd99g6-BfjaU17WEynd6Pm2degLWzmB_Y';
    private     $channel_id = 'UC4zRmZ8mI7OV9cL8MhroopA';



    function __construct()
    {
        // $ci = &get_instance();
    }

    public function get_video()
    {
        $json = $this->api_excute();
        $array = json_decode($json, true);

        $item = $array['items'];

        $html = "";
        foreach ($item as $row) {
            $html .= "<br>";
            $html .= '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' . $row['id']['videoId'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
        return $html;
    }

    function api_excute()
    {
        $api_key = $this->api_key;
        $channel_id = $this->channel_id;
        $url = 'https://www.googleapis.com/youtube/v3/search?'
            . 'key=' . $api_key . '&'
            . 'channelId=' . $channel_id . '&'
            . 'part=snippet,id&order=date&maxResults=' . $this->video_show;

        // $url = 'http://example.com/';
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
