<?php

namespace App\Http\Controllers;

use App\Booth;
use App\BoothInterest;
use App\EventSession;
use App\LoginLog;
use App\Notification;
use App\Points;
use App\Prize;
use App\ProvisionalGroup;
use App\Report;
use App\User;
use App\UserConnection;
use App\UserLookingTagLinks;
use App\UserTag;
use App\UserTagLinks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\FAQ;
use App\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Swagbag;
use App\Room;
use Illuminate\Mail\Message;
use Mail;
use Sichikawa\LaravelSendgridDriver\Transport\SendgridTransport;
use App\sessionRooms;
use Dotenv\Result\Success;

class EventController extends Controller
{
    public function index()
    {
        $booths = Booth::orderBy("name")->with([
            "images",
            "videos",
            "resources",
            "room",
        ])->get([
            "id",
            "name",
            "calendly_link",
            "url",
            "type",
            "boothurl"
        ]);
        $boothrooms = Room::orderBy("position")->get()->load("booths");

        $reports = Report::with(["resources", "video"])->get();
        $FAQs = FAQ::all();
        //        $provisionals = ProvisionalGroup::with(["resource", "video"])->get();
        $prizes = Prize::with("images")->orderBy("criteria_low")->get();
        $schedule = getSchedule();
        $user = Auth::user();
        $sessionrooms = sessionRooms::all()->groupBy("master_room");
        $sessionroomnames = [];
        foreach($sessionrooms as $master_room=>$rooms){
            // if(isset($sessionroomids[$master_room]))
            // {
            //     array_push($sessionroomids[$master_room],[$room]);
            // }else{
                $roomnames = [];
                foreach($rooms as $room ){
                    array_push($roomnames,$room->name);
                }
                $sessionroomnames[$master_room] = $roomnames;

            // }
        }
        // dd($sessionroomids);
        $sessions = EventSession::all()->load(["parentroom"]);
        
        
        $user->load("subscriptions");
        $subscriptions = [];
        foreach ($user->subscriptions as $subscription) {
            $subscriptions[] = $subscription->session_id;
        }
        // dd($schedule);
        return view("event.index")
            ->with(
                compact([
                    "booths",
                    "FAQs",
                    "reports",
                    //                    "provisionals",
                    "boothrooms",
                    "schedule",
                    "subscriptions",
                    "prizes",
                    "sessions",
                    "sessionrooms",
                    "sessionroomnames",
                ])
            );
    }

    public function createGroup(Request $request)
    {
        $room = $request->get("room");
        Http::withHeaders([
            "apiKey" => env("COMET_CHAT_API_KEY"),
            "appId" => env("COMET_CHAT_APP_ID"),
            "accept" => "application/json"
        ])
            ->post(env('COMET_CHAT_BASE_URL') . "/v2.0/groups", [
                "guid" => $room,
                "name" =>  str_replace("Inc","Inc.",ucfirst(str_replace("_"," ",$room))) ,
                "type" => "public"
            ]);
            return true;
    }

    public function addToBag(Request $request)
    {
        $user = Auth::user();
        $details = [
            "resources_id" => $request->get("resource"),
            "user_id" => $user->id
        ];
        Swagbag::firstOrCreate($details);
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }
    public function deleteFromBag(Request $request)
    {
        $user = Auth::user();
        $items = $request->get("resource");
        if (is_array($items)) {
            Swagbag::where("user_id", $user->id)->whereIn('resources_id', $items)->delete();
        } else {
            Swagbag::where([
                ["user_id", $user->id],
                ["resources_id", $request->get("resource")],
            ])->delete();
        }
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }
    public function getSwagBag()
    {
        $user = Auth::user();
        $userSwagbag = Swagbag::where("user_id", $user->id)
            ->with([
                "resource.booth",
                "report.video",
                "report.resources",
                //                "provision.resource",
                //                "provision.video"
            ])->get()->toArray();
        return [
            "success" => true,
            "bag" => array_merge(
                $userSwagbag,
                PERMANANT_SWAGS
            ),
        ];
    }

    /**
     * View for Admin Leaderboard
     */
    public function leaderboardView(){
        return view("dashboard.reports.leader");
    }

    public function leaderboard()
    {
        return User::orderBy("points", "desc")
            ->where("points", ">", 0)
            ->limit(env("LEADERBOARD_LIMIT", 50))
            ->get(["name", "points", "last_name"])
            ->map(function ($user) {
                return [
                    $user->name . " " . $user->last_name,
                    $user->points
                ];
            });
    }

    public function saveprofile(Request $request)
    {
        $currentUser = Auth::user();
        $url = $request->get("url");
        if (isset($url)) {
            $user = User::where("id", $currentUser->id)->update(["profileImage" => $url]);
        } else {
            return [
                "success" => false,
                "message" => "Null URL"
            ];
        }
        // $pointsDetails = [
        //     "points_to" => $currentUser->id,
        //     "points_for" => "Profile-Picture-Update",
        //     "points" => PROFILE_PICTURE_UPDATE
        // ];
        // if (!Points::where($pointsDetails)->count()) {
        //     Points::create($pointsDetails);
        //     User::where("id", $currentUser->id)->update([
        //         "points" => DB::raw('points+' . $pointsDetails["points"]),
        //     ]);
        // }
        return [
            "success" => true,
        ];
    }
    public function saveTags(Request $request){
        $data = $request->except("_token");
        $taglist =  $data["data"];
        $email = '';
        foreach($taglist as $tags){
             foreach ($tags as $index => $tag)
            {
                if($index==="email"){
                   continue;
                 }else{
                    $email = $tags['email'];
                    $user = User::where('email',$email)->first();
                    // return ["success"=>true ,"index"=>$index];
                    if(isset($user->id)){
                        if(strpos($index,"*"))
                        {
                            // $multipletags = explode(",", $tag);
                            $multipletags = explode(",",$tag);
                            foreach($multipletags as $innertag){
                                if($innertag && $innertag !=="" && $innertag !==" "){

                                    $existingTag = UserTag::where("tag", "like", str_replace(".",",",$innertag))->first();
                                    if (!$existingTag) {
                                        $user->tags()->create([
                                            "tag" =>  str_replace(".",",",$innertag),
                                            "tag_group" => str_replace("*","",$index) 
                                            ]);
                                    } else {
                                            if(!UserTagLinks::where([
                                                'tag_id' => $existingTag->id,
                                                'user_id' => $user->id
                                                ])->first()){
                                                UserTagLinks::create([
                                                    'tag_id' => $existingTag->id,
                                                    'user_id' => $user->id
                                                    ]);
                                            }
                                        }
                                }
                            }
                        }else{
                            if($tag && $tag !=="" && $tag !==" "){
                              
                                    $existingTag = UserTag::where("tag", "like", str_replace(".",",",$tag))->first();
                                    if (!$existingTag) {
                                        $user->tags()->create([
                                            "tag" =>  str_replace(".",",",$tag),
                                            "tag_group" => str_replace("*","",$index) 
                                            ]);
                                    } else {
                                            if(!UserTagLinks::where([
                                                'tag_id' => $existingTag->id,
                                                'user_id' => $user->id
                                                ])->first()){
                                                UserTagLinks::create([
                                                    'tag_id' => $existingTag->id,
                                                    'user_id' => $user->id
                                                    ]);
                                            }
                                        }
                                }
                        }
                    }
                }
            }
        }
        return ['success'=> True ];
    }
    public function saveLookingfor(Request $request){
        $data = $request->except("_token");
        $taglist =  $data["data"];
        $email = '';
        foreach($taglist as $tags){
             foreach ($tags as $index => $tag)
            {
                if($index==="email"){
                   continue;
                 }else{
                    $email = $tags['email'];
                    $user = User::where('email',$email)->first();
                    if($tag && $tag !=="" && $tag !==" "){

                    // return ["success"=>true ,"index"=>$index];
                        if(isset($user->id)){
                            if(strpos($index,"*"))
                            {
                                // $multipletags = explode(",", $tag);
                                $multipletags = explode(",",$tag);
                                foreach($multipletags as $innertag){
                                    $existingTag = UserTag::where("tag", "like", str_replace(".",",",$innertag))->first();
                                       if (!$existingTag) {
                                            $user->looking_for_tags()->create([
                                                "tag" =>  str_replace(".",",",$innertag),
                                                "tag_group" => str_replace("*","",$index) 
                                                ]);
                                        } else {
                                                if(!UserLookingTagLinks::where([
                                                    'tag_id' => $existingTag->id,
                                                    'user_id' => $user->id
                                                    ])->first()){
                                                    UserLookingTagLinks::create([
                                                        'tag_id' => $existingTag->id,
                                                        'user_id' => $user->id
                                                        ]);
                                                }
                                            }
                                }
                            }else{
                                $existingTag = UserTag::where("tag", "like", $tag)->first();
                                  $existingTag = UserTag::where("tag", "like", str_replace(".",",",$tag))->first();
                                    if (!$existingTag) {
                                        $user->looking_for_tags()->create([
                                            "tag" =>  str_replace(".",",",$tag),
                                            "tag_group" => str_replace("*","",$index) 
                                            ]);
                                    } else {
                                            if(!UserLookingTagLinks::where([
                                                'tag_id' => $existingTag->id,
                                                'user_id' => $user->id
                                                ])->first()){
                                                UserLookingTagLinks::create([
                                                    'tag_id' => $existingTag->id,
                                                    'user_id' => $user->id
                                                    ]);
                                            }
                                        }
                            }  
                        }
                    }

                }
            }
        }
        return ['success'=> True ];
    }


    public function updateProfile(Request $request)
    {
        $currentUser = Auth::user();
        $currentUser->update($request->except(["email", "tags"]));
        $tags = $request->get("tags", false);
        $looking_for_tags = $request->get("looking_for_tags", false);
        $interests = $request->get("interests", false);
        if (is_array($tags)) {
            $currentUser->tagLinks()->delete();
            foreach ($tags as $tag) {
                $existingTag = UserTag::where("tag", "like", $tag)->first();
                if (!$existingTag) {
                    $currentUser->tags()->create([
                        "tag" => $tag
                    ]);
                } else {
                    UserTagLinks::create([
                        'tag_id' => $existingTag->id,
                        'user_id' => $currentUser->id
                    ]);
                }
            }
        }
        if (is_array($looking_for_tags)) {
            $currentUser->tagLookingLinks()->delete();
            foreach ($looking_for_tags as $tag) {
                $existingTag = UserTag::where("tag", "like", $tag)->first();
                if (!$existingTag) {
                    $currentUser->looking_for_tags()->create([
                        "tag" => $tag
                    ]);
                } else {
                    UserLookingTagLinks::create([
                        'tag_id' => $existingTag->id,
                        'user_id' => $currentUser->id
                    ]);
                }
            }
        }
        if (is_array($interests)) {
            $currentUser->interests()->delete();
            foreach ($interests as $interest) {
                $currentUser->interests()->create([
                    "interest" => $interest,
                ]);
            }
        }
        return [
            "success" => true,
        ];
    }

    public function trackEvent(Request $request)
    {
        $type = $request->get("type", "login");
        $userId = Auth::user()->id;
        $pointsDetails = [
            "points_to" => $userId,
            "points_for" => $type,
            "details" => $request->get("details", ""),
        ];
        switch ($type) {
            case "scavengerHunt":
                $page = $request->get("page");
                $index = $request->get("index");
                $name = $request->get("name");
                if (
                    isset(SCAVENGER_HUNT[$page]) &&
                    isset(SCAVENGER_HUNT[$page][$index]) &&
                    isset(SCAVENGER_HUNT[$page][$index]['name']) &&
                    SCAVENGER_HUNT[$page][$index]['name'] == $name
                ) {
                    //Verified item, now saving to database
                    $pointsDetails["points"] = SCAVENGER_HUNT_POINTS;
                    $pointsDetails["details"] = $page . "|" . $index . "|" . $name;
                    if (!Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                }
                break;

            case "boothVisit":
                $id = $request->get("id");
                $booth = Booth::find($id);
                if ($booth) {
                    //Verified booth, now saving to database
                    $pointsDetails["points"] = BOOTH_VISIT_POINTS;
                    $pointsDetails["details"] = $id;

                    if (!Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                }
                break;

            case "BoothChat":
                $id = $request->get("id");
                $booth = Booth::find($id);
                if ($booth) {
                    //Verified booth, now saving to database
                    $pointsDetails["points"] = BOOTH_CHAT_POINTS;
                    $pointsDetails["details"] = $id;
                    if (!Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                }
                break;

            case "boothContentTab":
                $id = $request->get("id");
                $tab = $request->get("tab", false);
                $validTabs = ["description-modal-" . $id, "videolist-modal-" . $id, "resourcelist-modal-" . $id];
                $booth = Booth::find($id);
                if (
                    $booth && $tab && in_array($tab, $validTabs)
                ) {
                    //Verified booth and tab, now saving to database
                    $pointsDetails["points"] = BOOTH_RESOURCES_VIEW_POINTS;
                    $pointsDetails["details"] = $id . "|" . $tab;

                    if (!Points::where($pointsDetails)->count()) {
                        Points::create($pointsDetails);
                        User::where("id", $userId)->update([
                            "points" => DB::raw('points+' . $pointsDetails["points"]),
                        ]);
                    }
                }
                break;

            case "resourceView":
                $pointsDetails["points"] = RESOURCE_VIEW_POINTS;
                $pointsDetails["details"] = request()->get("url", false);
                if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                    Points::create($pointsDetails);
                    User::where("id", $userId)->update([
                        "points" => DB::raw('points+' . $pointsDetails["points"]),
                    ]);
                }
                break;

            case "sessionView":
                $pointsDetails["points"] = SESSION_ATTENDING_POINTS;
                $pointsDetails["details"] = request()->get("id", false);
                if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                    Points::create($pointsDetails);
                    User::where("id", $userId)->update([
                        "points" => DB::raw('points+' . $pointsDetails["points"]),
                    ]);
                }
                break;

            case "videoView":
                $pointsDetails["points"] = VIDEO_VIEWING_POINTS;
                $pointsDetails["details"] = request()->get("video", false);
                if ($pointsDetails["details"] && !Points::where($pointsDetails)->count()) {
                    Points::create($pointsDetails);
                    User::where("id", $userId)->update([
                        "points" => DB::raw('points+' . $pointsDetails["points"]),
                    ]);
                }
                break;

            case "boothBookingModalOpened":
            case "boothBookingSlotSelected":
            case "boothBookingCallScheduled":
            case "boothShowInterestButtonClicked":
                //This it is just for analytics - keep on recording without giving points
                $pointsDetails["points"] = 0;
                $pointsDetails["details"] = $request->get("id");
                Points::create($pointsDetails);
                break;
            case "LoungeSessionAttended":
                $pointsDetails["points"] = 0;
                $pointsDetails["details"] = $request->get("name");
                Points::create($pointsDetails);
                break;


            default:
                //By Default it is just for analytics - keep on recording without giving points
                $pointsDetails["points"] = 0;
                Points::create($pointsDetails);
        }
        return "OK";
    }

    public function sendSwagsToEmail()
    {
        $user = Auth::user();
        $swags = Swagbag::where("user_id", $user->id)->with([
            "resource.booth",
            "report.resources",
        ])->get();
        $resources = [];
        foreach ($swags as $swag) {
            if ($swag->resource) {
                $title = $swag->resource->title;
                if (isset($swag->resource->booth) && isset($swag->resource->booth->name)) {
                    $title .= " (" . $swag->resource->booth->name . ")";
                }
                array_push($resources, ["title" => $title, "link" => assetUrl($swag->resource->url)]);
            }
            if (isset($swag->report) && isset($swag->report->resources)) {
                foreach ($swag->report->resources as $resource) {
                    array_push($resources, ["title" => $resource->title, "link" => assetUrl($resource->url)]);
                }
            }
        }

        Mail::send([], [], function (Message $message) use ($user, $resources) {
            $message
                ->to($user->email)
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->replyTo(env('MAIL_TO_ADDRESS'), env('MAIL_TO_NAME'))
                ->embedData([
                    'personalizations' => [
                        [
                            'dynamic_template_data' => [
                                'user' => "{$user->name} {$user->last_name}",
                                'resources'  => $resources,
                            ],
                        ],
                    ],
                    'template_id' => config("services.sendgrid.templates.swagbag"),
                ], SendgridTransport::SMTP_API_NAME);
        });

        return ["success" => TRUE];
    }

    public function generateMeetingSignature($id)
    {
        return response([
            "signature" => generateSignature($id)
        ], 200)
            ->withHeaders(["Access-Control-Allow-Origin" => "*"]);
    }

    public function auditoriumEmbed(Request $request)
    {
        try {
            $user = Auth::user();
            $videoId = $request->get("id", false);
            $type = $request->get("type", EVENT_ROOM_AUDI);
            if(in_array($type, WORKSHOP_ROOMS)){
                $videoId = getField((str_replace(" ","_", $type))."_Stream");
                return view("event.vimeoEmbed")->with(compact("videoId"));
            }
            // else{
            //     createField("Auditorium_Stream", "text", "Streams");
            //     $videoId = getField("Auditorium_Stream");
            //     dd("hello");
            //     return view("event.vimeoEmbed")->with(compact("videoId"));
            // }
            // dd($type);

            $session = $this->getCurrentRunningSession($type);
            if (!$session) {
                return view("event.noSession");
            }
            if ($type === "caucus" || $type === "workshop") {
                if (strlen($session->zoom_webinar_id)) {
                    return redirect(route("webinar", getZoomParameters($session->zoom_webinar_id, $session->zoom_password && strlen($session->zoom_password) ? $session->zoom_password : "")));
                }
            }
            $videoId = false;
            if ($session && $session->vimeo_url) {
                $videoId = $session->vimeo_url;
            }

            if($session->type == "ZOOM_URL"){
                return redirect($session->zoom_url);
            }
            //Setup for normal days
            //To make it visible only for delegates add && $user->type === USER_TYPE_DELEGATE
            if (strlen($session->zoom_webinar_id) ) { 
                return redirect(route("webinar", getZoomParameters($session->zoom_webinar_id, $session->zoom_password && strlen($session->zoom_password) ? $session->zoom_password : "")));
            }
            //Setup for first two days - To be removed later
            //            if (strlen($session->zoom_webinar_id)) {
            //                return redirect(route("webinar", getZoomParameters($session->zoom_webinar_id, $session->zoom_password && strlen($session->zoom_password) ? $session->zoom_password : "")));
            //            }
            if ($videoId) {
                return view("event.vimeoEmbed")->with(compact("videoId"));
            }
            return view("event.noSession");
        } catch (\Exception $e) {
            return view("event.noSession");
        }
    }

    //    public function meetEmbed(Request $request){
    //        $index = $request->get("id", 0);
    //        if(isset(MEET_AND_GREET[$index])){
    //            return redirect(
    //                route(
    //                    "webinar",
    //                    getZoomParameters(
    //                        MEET_AND_GREET[$index]['zoom_meet_id'],
    //                    MEET_AND_GREET[$index]['zoom_password'] && strlen(MEET_AND_GREET[$index]['zoom_password']) ? MEET_AND_GREET[$index]['zoom_password'] : ""
    //                    )
    //                )
    //            );
    //        }
    //        return view("event.noSession");
    //    }

    public function webinar()
    {
        return view("event.webinar");
    }

    public function webinarEnded()
    {
        return view("event.webinarEnded");
    }

    public function onlineDelegates()
    {
        $delegates = User::where("type", USER_TYPE_DELEGATE)->get([
            "name",
            "online_status"
        ]);
        return $delegates;
    }

    private function getCurrentRunningSession($room)
    {
        if ($room === "caucus") {
            $user = Auth::user();
            $room = strtolower($user->region_name);
            if (in_array($room, REGIONS)) {
                $session = getCurrentSession($room);
                if ($session && $session->id) {
                    return $session;
                }
            }
            if (isset(REGIONS_NAMES_TO_VALUE[$room])) {
                $session = getCurrentSession(REGIONS_NAMES_TO_VALUE[$room]);
                if ($session && $session->id) {
                    return $session;
                }
            }
        } else {
            $session = getCurrentSession(strtoupper($room));
            if ($session && $session->id) {
                return $session;
            }
        }
        return false;
    }

    public function getCurrentSession(Request $request)
    {
        $room = $request->get("room", EVENT_ROOM_AUDI);
        $session = $this->getCurrentRunningSession($room);
        if ($session) {
            return [
                "id" => $session->id
            ];
        }
        return [
            "id" => false
        ];
    }

    public function getBoothDetails(Booth $booth)
    {
        return [$booth->description,$booth->description_two];
    }

    public function getDelegatesList()
    {
        $onlineDelegates = User::where("type", USER_TYPE_DELEGATE)->where("updated_at", ">", Carbon::now()->subtract("mins", 1))->get(["id"]);
        $onlineIds = [];
        foreach ($onlineDelegates as $delegate) {
            $onlineIds[] = $delegate->id;
        }
        User::where("type", USER_TYPE_DELEGATE)->whereNotIn("id", $onlineIds)->update(["online_status" => 0]);
        return User::where("type", USER_TYPE_DELEGATE)->orderBy("online_status")->get(["name", "last_name", "online_status"]);
    }

    public function profileInfo()
    {
        return getProfileDetails();
    }

    public function contentTicker()
    {
        $updates = [];
        $user = Auth::user();
        $user->load([
            //            "unread_notifications",
            "unsent_notifications",
        ])
            ->loadCount("contacts")
            ->touch(); //Updating timestamps of user table to show online status

        //Check Users last Connection Requests
        $connectionRequests = UserConnection::where("connection_id", $user->id)->where("status", 0)->orderBy("created_at", "DESC")->select("created_at")->first();
        $updates['lastRequestTime'] = $connectionRequests ? $connectionRequests->created_at : false;

        //Check Users last Sent Connection Requests Status
        $connectionRequests = UserConnection::where("user_id", $user->id)->orderBy("updated_at", "DESC")->select("updated_at")->first();
        $updates['lastSentRequestTime'] = $connectionRequests ? $connectionRequests->updated_at : false;

        //Notifications
        $updates['notifications'] = $user->unsent_notifications;
        $updates['contacts_count'] = $user->contacts_count;
        //        $updates['all_notifications'] = $user->unread_notifications; //Not loading or sending unread notifications since we dont have actually managed it anywhere - nor do we have a space to show the list or archive of notifications
        $user->markNotificationsAsSent();

        return [
            "updates" => $updates,
        ];
    }

    public function showInterestInBooth($booth)
    {
        BoothInterest::firstOrCreate([
            "user_id" => \Auth::user()->id,
            "booth_id" => $booth,
        ]);
        return ["success" => true];
    }

    public function sendSessionNotifications()
    {
        $sessions = EventSession::where("start_time", "<=", Carbon::now()->add(10, "minutes"))->where("start_time", ">=", Carbon::now())->with("subscriptions.user_min")->get();
        $loginLastTime = Carbon::now()->subtract(ONLINE_KEEPING_TIME, "seconds");
        $sent = 0;
        foreach ($sessions as $session) {
            foreach ($session->subscriptions as $subscription) {
                $isOnline = $subscription->user_min->updated_at->isAfter($loginLastTime);
                $roomRoute = getRoomRoute($session->room);
                if ($roomRoute) {
                    if ($isOnline) {
                        //Sent in-app notification
                        $sent++;
                        Notification::firstOrCreate(
                            [
                                "type" => "info",
                                "action_type" => "session_reminder",
                                "user_id" => $subscription->user_id,
                                "action_id" => $session->id,
                            ],
                            [
                                "title" => "Session named '" . $session->name . "' is about to start. Join now",
                                "details" => $roomRoute,
                            ]
                        );
                    }
                    $subscription->user_min->sendPushNotification(
                        "Session named '" . $session->name . "' is about to start. Join now",
                        route("event") . "#" . strtolower($roomRoute)
                    );
                }
            }
        }
        return $sent;
    }

    public function generalReports(){
        return view("dashboard.reports.general");
    }

    public function generalReportsData(){
        $loginIdList = \App\LoginLog::orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("user_id")->get(["user_id", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->user_id;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\LoginLog::distinct("user_id")->count(),
            'login_last_1h' => \App\LoginLog::where("created_at", ">=", Carbon::now()->subtract("hour", 1))->distinct("user_id")->count(),
            'unique_login_count' => \App\LoginLog::where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("user_id")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function auditoriumReports(){
        $apiRoute = route("reports.auditorium.api");
        $logsRoute = route("reports.export.audiLogs");
        $logName = "Auditorium ";
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
        ]));
    }
    public function workshopReports($name){
        $apiRoute = route("reports.workshop.api", ['name' => $name]);
        $logsRoute = route("reports.export.workshopLogs",['name' => $name]);
        $logName = $name;
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
        ]));
    }

    public function boothReports(Booth $id){
        $apiRoute = route("reports.booth.api", ['id' => $id->id]);
        $logsRoute = route("reports.export.boothLogs",['id' => $id->id]);
        $logName = $id->name;
        return view("dashboard.reports.auditorium")->with(compact([
            'apiRoute',
            'logsRoute',
            'logName',
        ]));
    }

    public function auditoriumReportsData(){
        $eventName = "audi_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }
    public function workshopReportsData($name){
        $eventName = $name."_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }
    public function boothReportsData($id){
        $eventName = "boothVisit";
        $loginIdList = \App\Points::where("points_for", $eventName)->where("details", $id)->orderBy("created_at", "DESC")->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->get(["points_to", "created_at"]);
        $ids = [];
        foreach ($loginIdList as $loginLog){
            $ids[] = $loginLog->points_to;
        }
        $lastLoginList = \App\User::whereIn("id",$ids)->limit(50)->get(["name", "email"]);
        return [
            'login_total' => \App\Points::where("points_for", $eventName)->where("details", $id)->distinct("points_to")->count(),
            'login_last_1h' => \App\Points::where("points_for", $eventName)->where("details", $id)->where("created_at", ">=", Carbon::now()->subtract("hour", 1))->distinct("points_to")->count(),
            'unique_login_count' => \App\Points::where("points_for", $eventName)->where("details", $id)->where("created_at", ">=", Carbon::now()->startOf("day"))->distinct("points_to")->count(),
            'last_login_list' => $lastLoginList,
        ];
    }

    public function exportLoginLogs(){
        $log = LoginLog::orderBy("created_at", "DESC")->distinct("user_id")->with("user")->get([
            "user_id",
            "created_at",
        ]);
        $toSend = [];
        $uniqIds = [];
        foreach ($log as $item){
            if(!in_array($item->user_id,$uniqIds)){
                $uniqIds[] = $item->user_id;
                if($item->user){
                    $u = $item->user->toArray();
                    array_push($u,$item->created_at->format('j M Y H:i:s A'));
                    unset($u['id']);
                    $toSend[] = $u;
                }
            }
        }
        return $toSend;
    }

    public function exportAuditoriumLogs(){
        $loginIdList = \App\Points::where("points_for", "audi_visit")->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog){
            if($loginLog->user){
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('j M Y H:i:s A'),
                ];
            }
        }
        return $ids;
    }

    public function exportWorkshopLogs($name){
        $eventName = $name."_visit";
        $loginIdList = \App\Points::where("points_for", $eventName)->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog){
            if($loginLog->user){
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('j M Y H:i:s A'),
                ];
            }
        }
        return $ids;
    }

    public function exportBoothLogs($id){
        $eventName = "boothVisit";
        $loginIdList = \App\Points::where("points_for", $eventName)->where("details", $id)->orderBy("created_at", "DESC")->distinct("points_to")->with("User")->get();
        $ids = [];
        foreach ($loginIdList as $loginLog){
            if($loginLog->user){
                $ids[] = [
                    "Email" => $loginLog->user->email,
                    "Name" => $loginLog->user->name,
                    "Last Name" => $loginLog->user->last_name,
                    "Visited At" => $loginLog->created_at->format('Y-m-d\TH:i'),
                ];
            }
        }
        return $ids;
    }
}
