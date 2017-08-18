<?php
/**
* config file for navbar
*/
return [
    "navbar-main" => [
        "config" => [
            "navbar-class" => "nav navbar-nav"
        ],
        "items" => [
            "hem" => [
                "text" => "HEM",
                "route" => "",
                "class" => ""
            ],
            "om" => [
                "text" => "OM",
                "route" => "about",
                "class" => ""
            ],
            "redovisningar" => [
                "text" => "REDOVISNINGAR",
                "route" => "report",
                "class" => ""
            ]
        ]
    ]
];
