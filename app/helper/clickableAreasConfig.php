<?php
define("LOBBY_AREAS", [
     "walker_hall" => [
         "title" => "Walker Expo Hall",
         "link" => "room/ca9d92bd-e5a1-4392-9659-b65d9c857310",
         "area" => [ 42, 19.5, 15.5, 13 ], //In Percentage
     ],
     "lewis_hall" => [
         "title" => "Lewis Expo Hall",
         "link" => "room/d4021162-16a5-43a2-aba1-005ac9507717",
         "area" => [ 42, 65.5, 15.5, 13 ], //In Percentage
     ],
     "Fireside Chat" => [
         "title" => "Fireside Chat",
         "link" => "sessions-list/fireside_chat",
         "area" => [ 54, 29.5, 9.5, 13 ], //In Percentage
     ],
     "Peek Behind the Corporate Veil" => [
         "title" => "Peek Behind the Corporate Veil",
         "link" => "sessions-list/peek_behind_corporate_veil",
         "area" => [ 54, 60.5, 9.5, 13 ], //In Percentage
     ],
    "Welcome Video 1" => [
        "title" => "welcome",
        "area" =>[ 56,39,6.5,8],
        "class" => "txt-white",
        "videoEmbed" => "https://vimeo.com/514564783",
    ],
    "Welcome Video 2" => [
        "title" => "welcome",
        "area" =>[ 56,54.5,6.5,8],
        "class" => "txt-white",
        "videoEmbed" => "https://vimeo.com/515024188",
    ],
//    "Photobooth" => [
//        "title" => "photobooth",
//        "area" =>[ 38.5,8.4,11.3,12 ],
//        "link" => "photo-booth",
//    ],
//    "HallOfFame" => [
//        "title" => "HallOfFame",
//        "link" => "museum",
//        "area" => [ 39.5, 65.5, 14.5, 13] , //In Percentage
//    ],
    "InfoDesk" => [
        "title" => "infodesk",
        "link"=> "infodesk",
        "area" =>[ 68,37,26,9],
    ],
    "Lounge" => [
        "title" => "Lounge",
        "link"=> "lounge",
        "area" =>[ 41.5,43.4,14.5,14],
    ],
//    "PhotoB2" => [
//        "title" => "Photo Booth",
//        "link"=> "photo-booth",
//        "area" =>[ 53.5,17.8,3.5,4],
//    ],
    "Auditorioum" => [
        "title" => "Auditorium",
        "link" => "sessionroom/Auditorium",
        "area" => [ 54, 45.5, 9.5, 12] , //In Percentage
    ],
//    "Workshop" => [
//        "title" => "Workshop",
//        "link" => "workshop",
//        "area" => [ 29, 57.5, 12.5, 17] , //In Percentage
//    ],
]);

define("LOUNGE_AREAS", [
    "Trivia" => [
        "title" => "Trivia",
        "zoom_url"=> "https://eventsibles.zoom.us/j/83448563720?pwd=Z2ZzQ1pxd3BrTzRSTnFSUlRKT011Zz09",
        "area" =>[ 12.8,2.8,11.2,11],
    ],
    "WineTasting" => [
        "title" => "Wine Tasting",
        "zoom_url"=> "https://eventsibles.zoom.us/j/89621735900?pwd=R3FQNTdwSUxqZUNZV2N3K3pPSUhEZz09",
        "area" =>[ 26.8,3,11.3,11],
    ],
    "Mixology" => [
        "title" => "Mixology",
        "zoom_url"=> "https://eventsibles.zoom.us/j/83624749324?pwd=MVBYTTVVRlhLSmpZbS9ObjhnVlpIdz09",
        "area" =>[ 12.8,85.8,11.2,11],
    ],
    "ChocolateTasting" => [
        "title" => "Chocolate Tasting",
        "zoom_url"=> "https://eventsibles.zoom.us/j/87120424525?pwd=NEF5TjVmTDJaQ3dGOUFlNkRaUjQ5UT09",
        "area" =>[ 26.8,85.8,11.2,11],
    ],
    "YOUAREONMUTE" => [
        "title" => "You Are On Mute",
        "zoom_url"=> "https://eventsibles.zoom.us/j/83448563720?pwd=Z2ZzQ1pxd3BrTzRSTnFSUlRKT011Zz09",
        "area" =>[ 38.7,24.7,12.9,6.3],
    ],
    "YOUAREFROZEN" => [
        "title" => "You Are Frozen",
        "zoom_url"=> "https://eventsibles.zoom.us/j/89621735900?pwd=R3FQNTdwSUxqZUNZV2N3K3pPSUhEZz09",
        "area" =>[ 46.4,28.9,13.3,6.3],
    ],
    "SHARINGMYSCREEN" => [
        "title" => "Sharing My Screen",
        "zoom_url"=> "https://eventsibles.zoom.us/j/83624749324?pwd=MVBYTTVVRlhLSmpZbS9ObjhnVlpIdz09",
        "area" =>[ 38.6,60.7,14.4,6.3],
    ],
    "HAVETODROP" => [
        "title" => "Have To Drop",
        "zoom_url"=> "https://eventsibles.zoom.us/j/87120424525?pwd=NEF5TjVmTDJaQ3dGOUFlNkRaUjQ5UT09",
        "area" =>[ 46.2,59.7,12.8,6.3],
    ],
    "EnterTainmentRoom" => [
        "title" => "Entertainment Room",
        "link" => "sessionroom/Entertainment_Room",
        "area" => [ 43.8, 76.8,17.2,19] , //In Percentage
    ],
"Photobooth" => [
        "title" => "photobooth",
        "area" =>[ 41,43.5,13.5,22 ],
        "link" => "photo-booth",
    ],



 //   "InfoDesk" => [
 //       "title" => "infodesk",
 //       "link"=> "infodesk",
 //       "area" =>[ 48,23.5,52,20],
 //   ]
//    "Auditorioum" => [
//        "title" => "Auditorium",
//        "link" => "auditorium",
//        "area" => [ 25.5, 13, 9, 2] , //In Percentage
//    ],
//    "WorkShop" => [
//        "title" => "WorkShop",
//        "link" => "workshop",
//        "area" => [ 21.5, 13, 9, 2] , //In Percentage
//    ],
//    "FAQ" => [
//        "title" => "Expo Hall",
//        "link" => "expo-hall",
//        "area" => [ 16.5, 13, 9, 2.3 ], //In Percentage
//    ],
]);

//For Green Image
define("BOOTH_IMAGE_AREA_SLOTS", 4);
define("BOOTH_IMAGE_AREAS", [
    "candidate_standard"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [43.2, 45.1, 4.57, 9.2],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [43.2, 49.78, 4.5, 9.2],
                "type" => "image",

            ],
            "Slot 2" => [
                "area" => [43.2, 54.38, 4.5, 9.2],
                "type" => "image",

            ],
            "Slot 3" => [
                "area" => [43.2, 59, 4.5, 9.2],
                "type" => "image",

            ],
            "Slot 4" => [
                "area" => [22.1,34,15,9],//logo
                "type" => "image",
                "class" => "contain",
            ],
            "corousel" => [
                "area" =>[63.4,33.5,7.8,14.1],
                "type" => "corousel"
            ],
            "brandvideo" => [
                "area" => [36.7,32.2,10.7,11.6],
                "type" => "video",
            ],
        ]
    ],
    "candidate_platinum"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [29,20.9,8.1,5],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [30.1,49.6,14.03,8.8],
                "type" => "image",

            ],
            "Slot 2" => [
                "area" => [42.8,44.2,5.29,13.1],
                "type" => "image",
            ],
            "Slot 3" => [
                "area" => [42.8,50.6,5.19,13.1],
                "type" => "image",
            ],
            "Slot 4" => [
                "area" => [62.3,70.1,9.8,2.3],
                "type" => "image",
            ],

            "corousel" => [
                "area" =>[37.0,20.89,8.18,38.1],
                "type" => "corousel"
            ],
            "brandvideo" => [
                "area" => [43.8,59.2,8.9,10.6],
                "type" => "video",
            ],
        ],
    ],
    "candidate_gold"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [45.599,30.1,4.19,11.3],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [45.599,35.3,4.19,11.3],
                "type" => "image",

            ],
            "Slot 2" => [
                "area" => [34.5,57.9,11.43,5.9],
                "type" => "image",
            ],
            "Slot 3" => [
                "area" => [65.2,62.1,5,7],
                "type" => "image",
            ],
            "corousel" => [
                "area" =>[45,44.19,10.18,12.5],
                "type" => "corousel"
            ],
            "brandvideo" => [
                "area" => [36.8,20.7,11,11.8],
                "type" => "video",
            ],
        ],
    ],"sponsor_standard"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [22.5,36.2,27.8,6.1],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [41,42,18.5,10],
                "type" => "video",
                "classes"=>"above_object"
            ],
        ],
    ],"sponsor_gold"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [47.46,36,7.87,8.2],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [47.46,47.4,7.87,8.2],
                "type" => "image",

            ],
            "Slot 2" => [
                "area" => [64.5,31.49,9.98,9.9],
                "type" => "image",
            ],
            "Slot 3" => [
                "area" => [21.79,54.56,20.13,10.2],
                "type" => "image",
            ],
            "brandvideo" => [
                "area" => [38.89,45.2,6.68,8.6],
                "type" => "video",
            ],
        ],
    ],"sponsor_platinum"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [21.2,16.9,33,12.8],
                "type" => "image",
                "class"=>"brrb"
            ],
            "Slot 1" => [
                "area" => [25.7,58.7,20.8,12.8],
                "type" => "image",
                "class"=>"rounded_border"
            ],
            "Slot 2" => [
                "area" => [65.4,61.4,19.4,9.8],
                "type" => "image",
                "class"=>"brl"
            ],
            "Slot 3" => [
                "area" => [65.599,20.2,8.89,10.3],
                "type" => "image",
            ],
            "brandvideo" => [
                "area" => [44.39,45.6,7.68,7.6],
                "type" => "video",
            ],
        ],
    ],
    "vendor"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [25.7,44.65,11.3,7],
                "type" => "image",
                "class"=>"rounded_border-4"
            ],
            "brandvideo" => [
                "area" => [42.69,39.1,11.78,11.6],
                "type" => "video",
            ],
            "Slot 1" => [
                "area" => [60,30.8,10.9,11.8],
                "type" => "image",
            ],
        ],
    ],
    "national_partners"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [0,0,0,0],
                "type" => "image"
            ],
            "brandvideo" => [
                "area" => [45.69,49.99,6.98,6.6],
                "type" => "video",
                "classes" => "above_object"
            ],
            "Slot 1" => [
                "area" => [0,0,0,0],
                "type" => "image",
                "class" => "clipped-left"
            ],
            "Slot 2" => [
                "area" => [0,0,0,0],
                "class" => "clipped-right",
                "type" => "image",
            ],
        ],
    ],
    "foundation"=>[
        "assets" => [
            "Slot 0" => [
                "area" => [39.4,21.9,5.8,20.5],
                "type" => "image"
            ],
            "Slot 1" => [
                "area" => [39.4,73.7,5.8,20.5],
                "type" => "image",
            ],
            "Slot 2" => [
                "area" => [38.3,36.3,7.2,4.8],
                "type" => "image",
            ],
            "Slot 3" => [
                "area" => [38.3,43.51,12.87,4.8],
                "type" => "image",
            ],
            "Slot 4" => [
                "area" => [38.3,56.3,7.2,4.8],
                "type" => "image",
            ],
            "Slot 5" => [
                "area" => [43,36.4,7.1,6.4],
                "type" => "image",
            ],
            "Slot 6" => [
                "area" => [43,43.6,12.78,6.4],
                "type" => "image",
            ],
            "Slot 7" => [
                "area" => [43,56.4,7.1,6.4],
                "type" => "image",
            ],
            "Slot 8" => [
                "area" => [65, 59, 6, 14.5],
                "type" => "link",
                "to" => "https://jackandjillfoundation.org/donate-now/",
            ],
            "Slot 9" => [
                "area" => [65, 35, 6, 14.5],
                "type" => "link",
                "to" => "https://jackandjillfoundation.org/",
            ],
        ],
    ],
    "american_family"=>[
        "assets" => [
            "brandvideo" => [
                "area" => [50.7,50.7,9.6,10.8],
                "type" => "video"
            ],
            "Slot 0" => [
                "area" => [53.4,65.55,11.5,7.8],
                "type" => "image",
            ]
        ],
    ],
]);

define("INF0_DESK_AREAS",[
//    "FAQ" => [
//        "title" => "FAQs",
//        "link" => "faq",
//        "area" => [19.7,62.8,8.3,21], //In Percentage
//    ],
    "support" => [
        "title" =>"Support",
        "link" => "support",
        "area" =>[27.3,43.98,11.2,22.4],
        "class" => "open-support-chat"
    ],
    "Auditorioum" => [
        "title" => "Auditorium",
        "link" => "sessionroom/Auditorium",
        "area" => [ 19.5, 36, 27.5, 9] , //In Percentage
    ],
    "workshop-list" => [
        "title" =>"Lewis Expo Hall",
        "link" => "room/d4021162-16a5-43a2-aba1-005ac9507717",
        "area" =>[17,74,15.7,10],
    ],
    "expo-hall" => [
        "title" =>"Walker Expo Hall",
        "link" => "room/ca9d92bd-e5a1-4392-9659-b65d9c857310",
        "area" =>[17,10.2,17.5,10],
    ]
]);

define("BOOTH_AREA_IMAGE_ASPECT", 56.23);
define("EXTERNAL_VIDEO_ASSETS_ASPECT", 56.15);

//Points definition for Gamification
define("SCAVENGER_HUNT_POINTS", 100);
//define("BOOTH_VISIT_POINTS", [
//    "e5267c89-d3f0-43b9-b5c8-2e170dacc9d1" => 200, //Sponsors
//    "acc62143-53a9-46e0-ab4e-8d95d463c41d" => 100, //Vendors
//    "9371ce28-c9c8-4851-a877-74a9f7b1ab7c" => 50, //Candidates
//]);
define("BOOTH_VISIT_POINTS", 100);
define("BOOTH_RESOURCES_VIEW_POINTS", 50);
define("BOOTH_CHAT_POINTS", 0);
define("LOGIN_POINTS", 50);
define("RESOURCE_VIEW_POINTS", 50);
define("PROFILE_PICTURE_UPDATE", 0);
define("SESSION_ATTENDING_POINTS", 70);
define("VIDEO_VIEWING_POINTS", 80);

define("SCAVENGER_HUNT", [
    "lobby" => [
        [
            "id" => 1,
            "name" => "Silver Gem",
            "area" => [ 75, 94, 2, 4, ],
            "image" => "event-assets/images/treasurehunt/4.png",
        ],
        [
            "id" => 2,
            "name" => "Pink Gem",
            "area" => [ 32, 2, 2, 4],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 3,
            "name" => "Round Gem",
            "area" => [ 32, 96, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ]
    ],
    "room0" => [
        [
            "id" => 4,
            "name" => "Silver Gem",
            "area" => [ 50, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/5.png",
        ],
        [
            "id" => 5,
            "name" => "Pink Gem",
            "area" => [ 78, 17, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 6,
            "name" => "Round Gem",
            "area" => [ 20, 85, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 12,
            "name" => "Round Gem",
            "area" => [ 80, 96, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/4.png",
        ]
    ],
    "room1" => [
        [
            "id" => 7,
            "name" => "Silver Gem",
            "area" => [ 14, 93, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/5.png",
        ],
        [
            "id" => 8,
            "name" => "Pink Gem",
            "area" => [ 65, 1, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/6.png",
        ],
        [
            "id" => 9,
            "name" => "Round Gem",
            "area" => [21, 13, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/2.png",
        ],
        [
            "id" => 11,
            "name" => "Pink Gem",
            "area" => [ 14, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
    ],
    "lounge" => [
        [
            "id" => 13,
            "name" => "Silver Gem",
            "area" => [ 56, 22, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/4.png",
        ],
        [
            "id" => 14,
            "name" => "Pink Gem",
            "area" => [ 65, 16.5, 2, 2],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 15,
            "name" => "Round Gem",
            "area" => [ 41, 21, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/5.png",
        ],
    ],
    "museum" => [
        [
            "id" => 16,
            "name" => "Silver Gem",
            "area" => [ 55, 84, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/museum1.png",
        ],
        [
            "id" => 17,
            "name" => "Pink Gem",
            "area" => [ 36, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/museum2.png",
        ],
        [
            "id" => 18,
            "name" => "Round Gem",
            "area" => [ 5, 14, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/museum3.png",
        ],
        [
            "id" => 18,
            "name" => "Round Gem",
            "area" => [ 79, 90, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/PS-Icon.png",
        ]
    ],
    "auditorium" => [
        [
            "id" => 19,
            "name" => "Silver Gem",
            "area" => [ 25, 80, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/3.png",
        ],
        [
            "id" => 20,
            "name" => "Pink Gem",
            "area" => [ 44, 2, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/5.png",
        ],
        [
            "id" => 21,
            "name" => "Round Gem",
            "area" => [ 45, 94, 2, 4 ],
            "image" => "event-assets/images/treasurehunt/4.png",
        ]
    ],
]);

define("AUDI_SCREEN_AREA", [ 15, 27.6, 44, 44 ]);
define("CAUCUS_SCREEN_AREA", [ 30, 34.3, 31.5, 27 ]);
define("FIRESIDE_SCREEN_AREA", [ 52, 61.3, 24.5, 14 ]);


define("AUDI_IMAGE_ASPECT", 56.15);
define("AUDI_VIDEO_ASPECT", 56.15);

//define("MEET_AND_GREET", [
//    [
//        "name" => "Claudia Curtis",
//        "zoom_meet_id" => "94505392138",
//        "zoom_password" => "",
//    ],
//]);
