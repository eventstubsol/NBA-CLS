{{--@foreach ($rooms as $id => $room)--}}
{{--    @if(!toShowCandidateBooth($room->id))--}}
{{--        @continue--}}
{{--    @endif--}}
{{--    <div class="page booths" id="room-{{ $room->id }}">--}}
{{--        <img src="{{ assetUrl(getField($room->type)) }}" class="positioned booth-bg" alt="">--}}
{{--        <h2>{{ $room->name }} - Booths {{$room->type}}</h2>--}}
{{--        <div class="booths position-relative" style="padding:10%;">--}}
{{--            @foreach($room->booths as $booth)--}}
{{--                <div class= "area candidate-booth positioned" style="width: 13.5%; height: 20%;top: 60%; left: 69%;" data-link="booth/{{ $booth->id }}">--}}
{{--                    <p>{{ $booth->name }}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}

{{--  Walker  Expo Hall  --}}

<div class="page booths pb-0" id="room-ca9d92bd-e5a1-4392-9659-b65d9c857310">
    <div class="booths position-relative" style="height: 100vh">
        <img src="{{ assetUrl(getField("walker_hall_image")) }}" class="positioned booth-bg" alt="">
            <div title="Booth Name" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 43%;  left: 70%;" data-link="booth/930a272a-62e9-467a-8a4d-7db23f51a628">
            </div>
            

    {!! getScavengerItems("room0") !!}
    </div>

</div>


{{--  Lewis Expo Hall  --}}
 <div class="page booths pb-0" id="room-d4021162-16a5-43a2-aba1-005ac9507717"> 
     <div class="booths position-relative" style="height: 100vh">
        <img src="{{ assetUrl(getField("lewis_hall_image")) }}" class="positioned booth-bg" alt="">
        <div title="Holland_Knight" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 85%" data-link="booth/75dbc6f7-08e5-48a9-9f9b-fafe126d1148">
        </div>
        <div title="JacksonLewis" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 75%;" data-link="booth/f917bba1-6396-4d99-8be3-82a2de3e9eff">
        </div>
         {!! getScavengerItems("room1") !!} 
     </div> 
 </div> 