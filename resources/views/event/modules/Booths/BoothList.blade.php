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
        <div title="Holland Knight" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 85%" data-link="booth/75dbc6f7-08e5-48a9-9f9b-fafe126d1148">
        </div>
        <div title="JacksonLewis" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 75%" data-link="booth/f917bba1-6396-4d99-8be3-82a2de3e9eff">
        </div>
        <div title="O'Melveny & Myers LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 63%" data-link="booth/ea547aa7-0b79-4b0d-9840-25d26633aa8d">
        </div>
        <div title="Ogletreee Deakins" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 51%" data-link="booth/1a6008c5-89ff-48b6-913f-4cfcabf30735">
        </div>
        <div title="Seyfarth Shaw LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 38%" data-link="booth/13250fee-fc53-4882-a889-3275b733a55c">
        </div>
         <div title="Shook Hardy & Bacon, LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 26%" data-link="booth/559d6fc0-696c-41ed-b5dd-5f869f133c0a">
        </div>
        <div title="Stinson LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 14%" data-link="booth/9be84b4b-38a1-4622-9852-d73c7ef2e9e3">
        </div>
        <div title="Weil, Gotshal & Manges LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 2%" data-link="booth/bfe09ca0-673c-40db-9874-f39ea13ab47c">
        </div>
         {!! getScavengerItems("room1") !!} 
     </div> 
 </div> 