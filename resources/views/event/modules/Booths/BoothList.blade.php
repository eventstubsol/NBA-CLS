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

<div class="page booths pb-0" id="room-ca9d92bd-e5a1-4392-9659-b65d9c857310">
{{--    <h2>Expo Hall 1 - Booths gold</h2>--}}
    <div class="booths position-relative" style="height: 100vh">
       <img src="{{ assetUrl(getField("expo_hall_image")) }}" class="positioned booth-bg" alt="">
{{--        @foreach ($rooms as $id => $room)--}}
{{--            @if($room->id !== "ca9d92bd-e5a1-4392-9659-b65d9c857310")--}}
{{--                @continue--}}
{{--            @endif--}}
{{--            @foreach($room->booths as $booth)--}}
{{--                <div class= "area candidate-booth positioned" style="width: 13.5%; height: 20%;top: 60%; left: 69%;" data-link="booth/{{ $booth->id }}">--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        @endforeach--}}
        <div class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 43%;  left: 70%;" data-link="booth/1537a4e7-3896-4cc2-8290-65e98699ee8c">
        </div>
        <div class= "area candidate-booth positioned" style="width: 7.5%;  height: 14%;  top: 25%;  left: 34%;" data-link="booth/245837d2-f45f-407a-a4b7-72358294f829">
        </div>
        <div class= "area candidate-booth positioned" style="width: 9%;  height: 14%;  top: 44%;  left: 56%;" data-link="booth/2d2858c2-da86-4a72-a8f6-e33aaa423e22">
        </div>
        <div title="Janssen Oncology" class= "area candidate-booth positioned" style="width: 7.5%;  height: 14%;  top: 26%;  left: 57%" data-link="booth/42d24fc2-5499-4f7d-8f92-3cf512885906">
        </div>
        <div class= "area candidate-booth positioned" style="width: 10.5%;  height: 14%;  top: 44%;  left: 19%;" data-link="booth/6c387fc4-9d14-4efb-bac6-6410b84b65b2">
        </div>
        <div class= "area candidate-booth positioned" style="width: 9.5%;   height: 13%;   top: 45%;   left: 32%;" data-link="booth/845925d2-faed-48b1-878d-9494f34bb851">
        </div>
        <div title="Sandoz" class= "area candidate-booth positioned" style="width: 6.5%;  height: 13%;   top: 26%;  left: 46%;" data-link="booth/877adf30-6ba6-42fd-bb96-7b0da4282533">
        </div>
        <div class= "area candidate-booth positioned" style="width: 7.5%;  height: 14%;  top: 27%;  left: 68%;" data-link="booth/9601595f-3102-409c-9f33-e44cc502c024">
        </div>
        {{--<div class= "area candidate-booth positioned" style="width: 8.5%;   height: 15%;   top: 43%;   left: 70%;" data-link="booth/e033ba8a-9750-401f-9a06-bd503bc69f8b">
        </div> --}}
        <div class= "area candidate-booth positioned" style="width: 9.5%;  height: 16%;  top: 42%;   left: 44%;" data-link="booth/d96a7075-53c1-46eb-a394-727d73d35312">
        </div>
        <div class= "area candidate-booth positioned" style="width: 15.5%;  height: 14%;  top: 61%;  left: 15%;" data-link="booth/1f01633d-a963-4464-a66e-6063457bdd36">
        </div>
        <div class= "area candidate-booth positioned" style="width: 14.5%;   height: 15%;   top: 60%;   left: 33%;" data-link="booth/f28f6c1d-4106-4f39-9372-a16a24c8607c">
        </div>
        <div class= "area candidate-booth positioned" style="width: 15.5%;   height: 15%;   top: 60%;   left: 51%;" data-link="booth/86df598a-ffe4-4983-97ee-5228eb5a7f57">
        </div>
        <div class= "area candidate-booth positioned" style="width: 14.5%;   height: 16%;   top: 60%;  left: 68%;" data-link="booth/8ce1e85e-d10b-489d-b84c-89cd008dc576">
        </div>
        <div class= "area candidate-booth positioned" style="width: 10.5%;   height: 14%;   top: 26%;   left: 21%;" data-link="booth/3f147eab-f790-47fd-bf1e-2bc344c6bdc5/">
        </div>
        <div class= "area candidate-booth positioned" style="width: 13.5%;  height: 13%;  top: 13%;  left: 42%;" data-link="lobby">
        </div>

    {!! getScavengerItems("room0") !!}
    </div>

</div>


{{--<div class="page booths has-padding padding-small pb-0" id="room-d4021162-16a5-43a2-aba1-005ac9507717">--}}
{{--    <h2>Expo Hall 2 - Booths platinum</h2>--}}
{{--    <div class="booths position-relative" style="padding-bottom:56.25%;">--}}
{{--        <img src="https://fits.sgp1.digitaloceanspaces.com/uploads/J4r2gFy7L9sIKXfZoqTHzqLsN7bxjjpIJEehOh2X.png" class="positioned booth-bg" alt="">--}}

{{--        <div title="RNS" class= "area candidate-booth positioned" style="width: 11.5%; height: 22%; top: 25%; left: 70%;" data-link="booth/2d2858c2-da86-4a72-a8f6-e33aaa423e22">--}}
{{--            <p>RNS</p>--}}
{{--        </div>--}}
{{--        <div title="Hall 1" class= "area candidate-booth positioned" style="width: 6.5%;height: 9%;top: 37%;left: 7%;" data-link="room/ca9d92bd-e5a1-4392-9659-b65d9c857310"></div>--}}
{{--        <div title="GCF" class= "area candidate-booth positioned" style="width: 16.5%; height: 26%; top: 50%; left: 30%;" data-link="booth/877adf30-6ba6-42fd-bb96-7b0da4282533">--}}
{{--            --}}{{--            <p>GCF</p>--}}
{{--        </div>--}}
{{--        <div title="BITS Aruba" class= "area candidate-booth positioned" style="width: 11.5%;  height: 19%;  top: 26%;  left: 18%;" data-link="booth/833ae5a1-8bac-496b-85f8-1256d22a93da">--}}
{{--            <p>BITS Aruba</p>--}}
{{--        </div>--}}
{{--        <div title="Pure Storage" class= "area candidate-booth positioned" style=" width: 11.5%;  height: 22%; top: 53%;  left: 14%;" data-link="booth/9601595f-3102-409c-9f33-e44cc502c024">--}}
{{--            <p>Pure Storage</p>--}}
{{--        </div>--}}
{{--        <div title="Malco Technoogies" class= "area candidate-booth positioned" style=" width: 12.5%; height: 24%; top: 53%; left: 72%;" data-link="booth/a86032ff-a95e-46ee-98a6-2f7df1497c88">--}}
{{--            <p>Malco Technologies</p>--}}
{{--        </div>--}}
{{--        <div title="SHARP" class= "area candidate-booth positioned" style="width: 16.5%; height: 26%; top: 50%; left: 52%;" data-link="booth/afc971c9-5bbf-4975-89ac-7911d9a07eef">--}}
{{--            --}}{{--            <p>SHARP</p>--}}
{{--        </div>--}}
{{--        Change ID's--}}
{{--        <div title="Mindware Dell" class= "area candidate-booth positioned" style="width: 23.5%; height: 22%; top: 24%; left: 31%;" data-link="booth/095edac5-937e-488d-bfba-0b4fd009e2e0">--}}
{{--            <p>Malco Technologies</p>--}}
{{--        </div>--}}
{{--        <div title="Talarix" class= "area candidate-booth positioned" style=" width: 11.5%; height: 22%; top: 25%; left: 57%;" data-link="booth/44725d22-3828-4901-8cf9-3a98a86f8092">--}}
{{--            <p>Malco Technologies</p>--}}
{{--        </div>--}}
{{--        {!! getScavengerItems("room1") !!}--}}
{{--    </div>--}}
{{--</div>--}}