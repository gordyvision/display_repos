<?php

    function api_request($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT,'display_repos');
    
        $results = curl_exec($ch);
    
        curl_close($ch);
    
        return json_decode($results, true);
    }

?>