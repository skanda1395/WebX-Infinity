<?php

    $url = "https://www.universal-tutorial.com/api/getaccesstoken";

    $resource = curl_init($url);
    curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($resource);
    curl_close($resource);

    


?>