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
            ],
            "remserver" => [
                "text" => "REMSERVER",
                "route" => "remserver",
                "class" => ""
            ],
            "kommentarsmodul" => [
                "text" => "KOMMENTARSMODUL",
                "route" => "commentary",
                "class" => ""
            ],
            "login" => [
                "text" => "LOGGA IN",
                "route" => "login",
                "class" => ""
            ],
            "logout" => [
                "text" => "LOGGA UT",
                "route" => "logout",
                "class" => ""
            ]
        ]
    ]
];
