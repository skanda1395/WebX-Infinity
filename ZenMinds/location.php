<?php

    $countries = [
        "India" => null
    ];

    $states = [
        "India" => [
            "Tamil Nadu" => null,
            "Karnataka" => null,
            "Maharastra" => null,
        ]
    ];

    $cities = [
        "Karnataka" => [
            "Bangalore" => null,
            "Mysore" => null,
            "Belgaum" => null,
        ],
        "Tamil Nadu" => [
            "Chennai" => null,
            "Coimbatore" => null,
            "Madurai" => null,
        ],
        "Telangana" => [
            "Hyderabad" => null,
            "Warangal" => null,
            "Nizamabad" => null,
        ],
        "West Bengal" => [
            "Kolkatta" => null,
            "Kharagpur" => null,
            "Durgapur" => null
        ],
        "Maharastra" => [
            "Mumbai" => null,
            "Pune" => null,
            "Nagpur" => null
        ]
    ];

    $val = "";

    if($_GET["q"] == "countries") {
        $val = $countries; 
    }
    else if($_GET["q"] == "states") {
        $val = $states[$_GET["country"]] ?? "";
    }
    else if($_GET["q"] == "cities") {
        $val = $states[$_GET["state"]] ?? "";
    } 

    echo json_encode($val);

?>