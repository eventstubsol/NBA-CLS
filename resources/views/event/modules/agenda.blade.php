<div class="mb-3" >
   
    <!-- List of Dates in Event -->
    <ul class="nav nav-pills navtab-bg nav-justified" style="margin: 0px -5px;">
        
        <!-- Calculate the Dates and order the schedule accordingly/ Group The schedule According to dates -->
        @php
            $lastDate = false;
            $i = 0;
            $dates = []; 
            foreach ($schedule as $master_room => $rooms){
                foreach($rooms as $room => $scheduleForRoom){
                    foreach ($scheduleForRoom as $id => $event){
                        if($lastDate != $event['start_date']['m']){
                            $lastDate = $event['start_date']['m'];
                        }
                        if(  in_array($id,  $subscriptions))
                        {
                            $event['id'] = $id;
                            $dates[$lastDate][$master_room][$room][] = $event;
                        }

                    }
                }
            }
        @endphp

        <!-- Create Pills for Dates -->
        @foreach($dates as $date => $master_room)
            @php
                $i++;
            @endphp
            <li class="nav-item">
                <a href="#agn-{{ $i }}" data-toggle="tab" aria-expanded="{{ $i === 1 ? 'true' : 'false' }}" class="nav-link @if($i === 1) active @endif">{{ $date }}</a>
            </li>
        @endforeach
        @php
            $i = 0;
        @endphp
        
    </ul>

        <!-- Tabs Content Start -->
        <div class="tab-content">
            <!-- Loop for Each Date  -->
            @foreach($dates as $date => $master_rooms)
                @php
                    $i++;
                @endphp
                <!-- Tab for each date -->
                <div class="tab-pane {{ $i === 1 ? "active show" : "" }}" id="agn-{{ $i }}">
                        @php
                            $j = 0;
                        @endphp

                        <!-- Pills for Master Room -->
                        <ul class="nav nav-pills navtab-bg nav-justified" style="margin: 0px -5px;">
                            @foreach($master_rooms as $master_room => $rooms)
                                @php
                                   $j++;
                                @endphp
                                    <li class="nav-item">
                                        <a href="#agn-{{ $i }}-{{ $j }}" data-toggle="tab" aria-expanded="{{ $j === 1 ? 'true' : 'false' }}" class="nav-link @if($j === 1) active @endif">{{ $master_room  === 'peek_behind_corporate_veil' ? 'PEEK BEHIND THE CORPORATE VEIL' :   strtoupper(str_replace("_"," ", $master_room==='Auditorium' || $master_room==='auditorium' ? 'IMPACT AUDITORIUM' : $master_room ))  }}</a>
                                    </li>
                            @endforeach
                        </ul>

                        @php
                            $j = 0;
                        @endphp
                        <!-- Master Room Tab content -->
                        <div class="tab-content">

                             <!-- Loop foreach master room Tab -->
                            @foreach($master_rooms as $master_room => $rooms)
                                @php
                                    $k=0;
                                    $j++;
                                @endphp
                            

                                <!-- Tabs for each master Room -->
                             
                                    @php
                                        $k=0;
                                    @endphp
                                    <!-- Room Tab Content -->
                                    <!-- <div class="tab-content"> -->
                                      <!-- Loop foreach Room   -->
                                      <div class=" tab-pane {{ $j === 1 ? "active show" : "" }}" id="agn-{{ $i }}-{{ $j }}">
                                        @foreach($rooms as $room => $events)
                                            @php
                                                $k++;
                                                $l = 0;
                                            @endphp
                                            <!-- Tabs for each room -->
                                                <!-- Print each event in agnedule -->
                                                @foreach($events as $id => $event)
                                                    @php 
                                                        $id = $event['id'];
                                                        $l++;
                                                    @endphp
                                                    <ul class="list-unstyled timeline-sm"> 
                                                        <li class="timeline-sm-item">
                                                            <span class="timeline-sm-date">
                                                                {{ $event['start_date']['dts'] }} - <br> {{ $event['start_date']['dte'] }}
                                                            </span>
                                                            <div class="border border-heavy p-2 mb-3 bg-white hover-shadow "> 
                                                                <div class="avatar-group mb-2">

                                                                    @foreach($event['speakers'] as $speaker)

                                                                        <a class="avatar-group-item open-profile-popup"

                                                                        data-id="{{ $speaker->speaker->id ?? "" }}" data-toggle="tooltip" data-placement="top"
                                                                        
                                                                        title="{{ isset($speaker->speaker->name) ? $speaker->speaker->name .' '. $speaker->speaker->last_name : "" }}"

                                                                        data-original-title="{{ isset($speaker->speaker->name) ?  $speaker->speaker->name .' '. $speaker->speaker->last_name: "" }}">

                                                                            <img src="{{ $speaker->speaker ? $speaker->speaker->profileImage ? assetUrl($speaker->speaker->profileImage) : "https://congress2021web.fra1.digitaloceanspaces.com/uploads/default-profile.jpeg" : null}}"

                                                                                class="rounded-circle avatar-sm" alt="">

                                                                        </a>

                                                                    @endforeach

                                                                </div>
                                                                <h5 class="mt-0 mb-1">{{ $event['name'] }}</h5>
                                                                <p class="text-dark mt-2">{!! $event['description'] !!}</p>
                                                               
                                                                @if($event['status'] === 1 || $event['status'] === 3)
                                                                    <span class="btn btn-sm btn-link text-muted font-14 ">
                                                                        <i class="mdi mdi-clock mr-1"></i>{{ $event['status'] === 1 ? "Ongoing" : "Starting soon" }}
                                                                    </span>
                                                                    @if(isset($event['type']))
                                                                        @if($event['type'] === 'PRIVATE_SESSION')
                                                                            <a href="{{ $event['zoom_url'] }}" class="btn btn-sm btn-link text-muted font-14 " target="_blank"> Join Session </a>
                                                                        @else
                                                                            <a href="javascript: void(0);" class="area btn btn-sm btn-link text-muted font-14 " data-link="sessionroom/{{ $event['room']}}"> Join This Session</a>
                                                                        @endif
                                                                    @endif
                                                                @elseif($event['status'] === -1)
                                                                    <span class="btn btn-sm btn-link text-muted font-14 ">
                                                                        Session Ended
                                                                    </span>
                                                                @endif
                                                                @if($event['status'] === -1 && $event['recording'])
                                                                    <a class="video-play btn btn-sm btn-link text-muted font-14"
                                                                    href="https://vimeo.com/{{ $event['recording'] }}">
                                                                        <i class="mdi mdi-video mr-1"></i> View Recording
                                                                    </a>
                                                                @endif
                                                                @if($event['status'] !== -1)
                                                                    <a href="javascript: void(0);" data-id="{{ $id }}" class="btn subscribe-to-event btn-sm btn-link text-muted font-14 {{ in_array($id, $subscriptions) ? "hidden" : "" }}">
                                                                        <!-- <i class="mdi mdi-bell-ring mr-1"></i>  -->
                                                                        + Add to Personal Agenda
                                                                    </a>
                                                                    @if($event['type'] !== 'PRIVATE_SESSION')
                                                                        <a href="javascript: void(0);" data-id="{{ $id }}" class="btn btn-danger unsubscribe-agenda btn-sm btn-link text-muted font-14  {{ in_array($id, $subscriptions) ? "" : "hidden" }}">
                                                                            <!-- <i class="mdi mdi-bell-off mr-1"></i> -->
                                                                                - Remove from Personal Agenda
                                                                        </a>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </li>
                                                    </ul>
                                                @endforeach
                                          
                                                
                                                @endforeach
                                                <!-- </div> -->
                                            </div>
                                  
                                <!-- </div> -->
                            @endforeach

                        </div>
                </div>  
            @endforeach
        </div>
</div>