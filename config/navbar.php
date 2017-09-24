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
            "books" => [
                "text" => "BÖCKER",
                "route" => "book",
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
        // "dropdown" => [
        //     "namn" => "ARTIKLAR",
        //     "items" => [
        //         "mvc" => [
        //             "text" => "MVC",
        //             "route" => "article/mvc"
        //         ]
        //     ]
        // ]
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
            "comments" => [
                "text" => "KOMMENTARER",
                "route" => "admincomments",
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
