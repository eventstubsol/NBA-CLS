<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventSubscription;
use App\User;
use App\EventSession;

class EventSubscriptionController extends Controller
{
  //to list all subsciptions
  public function index(){
    $agendas = EventSubscription::all();
    $agendas->load(["user_min","event"]);
    return view("agenda.list")
        ->with(compact("agendas"));
    }


//Faq create form
public function create(){
    $users = User::all();
    $sessions = EventSession::all();
    return view("agenda.createForm")->with(compact(["users","sessions"]));
}

public function bulk_create(Request $request)
{
    $data = $request->except("_token");
    $agenda =  $data["users"];
    $subscriptions = [];
    $email = '';
    $newagenda = [];
    foreach($agenda as $subscription){
      array_push($newagenda,  (array) $subscription);
    }
    foreach($newagenda as $subscription){
        foreach ($subscription as $index => $sub)
        {
             if($index==="email"){
                $email = $sub;
            }else{
                array_push($subscriptions,$sub);
            }
        }
    }
    if($email === ''){
        return [ "success" => FALSE, "message" => "Email Missing from CSV" , "data" => $newagenda ];
    }
    if(!count($subscriptions))
        return [ "success" => FALSE, "message" => "No sessions found"];

    $user = User::where('email',$email)->first();
    if(isset($user->id)){
        foreach($subscriptions as $subscription){
            $session = EventSession::where("name",$subscription)->first();
            if($session){
                $if_exists = EventSubscription::where([
                    "user_id"=>$user->id,
                    "session_id"=>$session->id
                    ])->first();

                if(!isset($if_exists->id)){
                    EventSubscription::create([
                        "user_id"=>$user->id,
                        "session_id"=>$session->id
                    ]);
                }
           }
        }
    }

      return ["success" => TRUE];
}


//Create new Faq instance
public function store(Request $request){
    $request->validate(["userid"=>"required","sessionids"=>"required"]);
    // dd($request->all());
    foreach($request->sessionids as $sessionid){
        EventSubscription::create([
            "user_id"=>$request->userid,
            "session_id"=>$sessionid
        ]);
    }
    return redirect()->to(route("subscriptions.index"));
}

//Show edit form
public function edit(EventSubscription $subscription){
    $subscription->load(["user_min"]);
    $user = $subscription->user;
    $sessions = EventSubscription::where("user_id",$subscription->user_id)->with(["event"])->get();
    $agendasessions = [];
    foreach($sessions as $session){
        array_push($agendasessions,$session->event->id);
    }
    // $users = User::where("id",$subscription->id)->get();
    $sessions = EventSession::all();
    return view("agenda.edit")
        ->with(compact(["subscription","user","agendasessions","sessions"]));
}

//Update FAQ Instance
public function update(Request $request, EventSubscription $subscription){
    $request->validate(["sessionids"=>"required"]);
    // dd($request->all());
    // dd($subscription->user_id);
    EventSubscription::where("user_id",$subscription->user_id)->delete();
    foreach($request->sessionids as $sessionid){
        EventSubscription::create([
            "user_id"=>$subscription->user_id,
            "session_id"=>$sessionid
        ]);
    }
    return redirect()->to(route("subscriptions.index"));
}

//Delete FAQ
public function destroy(EventSubscription $subscription){
    $subscription->delete();
    return redirect()->to(route("subscription.index"));
}
}
