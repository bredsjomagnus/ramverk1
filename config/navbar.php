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
    ],
    "navbar-admin" => [
        "config" => [
            "navbar-class" => "nav navbar-nav"
        ],
        "items" => [
            "hem" => [
                "text" => "HEM",
                "route" => "",
                "class" => ""
            ],
            "webshop" => [
                "text" => "WEBSHOP",
                "route" => "adminpagewebshop",
                "class" => ""
            ],
            "account" => [
                "text" => "ANVÄNDARKONTON",
                "route" => "adminpageaccounts",
                "class" => ""
            ],
            "innehåll" => [
                "text" => "INNEHÅLL",
                "route" => "adminpagecontent",
                "class" => ""
            ],
            "login" => [
                "text" => "LOGGA IN",
                "route" => "login",
                "class" => ""
            ],
            "logout" => [
                "text" => "LOGGA UT",
                "route" => "logoutprocess",
                "class" => ""
            ]
        ]
    ]
];
