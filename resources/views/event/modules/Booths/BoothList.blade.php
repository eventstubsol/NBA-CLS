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
       
       <div title="Alston & Bird" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 85%" data-link="booth/e8432607-6666-456b-8a9f-f10237ba9d55">
        </div>
       <div title="Barnes & Thornburg LLP" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 69%;  left: 75%" data-link="booth/42ea7e91-c0d1-4d51-a180-795b3ffe1e70">
        </div>
       <div title="Carlton Fields" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 63%" data-link="booth/e0a68b2e-db62-4d43-8162-60a535440573">
        </div>
       <div title="Crowell & Moring" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 51%" data-link="booth/fafc2096-a16f-4fb2-9fad-98b64e3426e4">
        </div>
       <div title="DLA Piper" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 38%" data-link="booth/0222d945-75dd-455a-b0ba-f22185a19cd9">
        </div>
       <div title="Fasken" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 26%" data-link="booth/ef36787e-36f1-4ebc-8ce8-d0e92499f0e7">
        </div>
       <div title="Hogan Lovells" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 14%" data-link="booth/e830614d-f55f-4480-91e1-d56f0b3b04a8">
        </div>
       <div title="Fish & Richardson" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 69%;  left: 2%" data-link="booth/7e7e4d9e-f43c-4359-b9ee-7c7246067d97">
        </div>
        
       <div title="K&L Gates" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 59%;  left: 87%" data-link="booth/0f6d6ba7-ba9c-47d4-a012-83ed8e55efe2">
        </div>
       <div title="McGuireWoods" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 59%;  left: 76%" data-link="booth/20ba9089-3e22-481e-80b9-9218f5361751">
        </div>
       <div title="Bowman and Brooke LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 63%" data-link="booth/d07859ae-ee57-4336-b808-cfc5a54457ff">
        </div>
       <div title="Bradley Arant Boult Cummings LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 51%" data-link="booth/a62bd00e-b182-481b-a298-b49a9c6c7de4">
        </div>
       <div title="GreenbergTraurig" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 38%" data-link="booth/45f94fcf-c355-4f36-8f0b-b91b7eb73d40">
        </div>
       <div title="Hamilton, Milller & Birthisel" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 28%" data-link="booth/571f902e-1c21-4559-96eb-52045a0993f3">
        </div>
       <div title="Ivie McNeill Wyatt Purcell & Diggs" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 16%" data-link="booth/cc7508b6-8af5-4d3b-b3a9-81e61314aeba">
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
        
        <div title="Morgan Lewis" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 59%;  left: 87%" data-link="booth/b2f7e284-2f30-4feb-9681-2d436281b019">
        </div>
        <div title="Perkins Coie, LLP" class= "area candidate-booth positioned" style="width: 9%;   height: 16%;   top: 59%;  left: 76%" data-link="booth/1db921f2-8c8a-47af-abe7-f4a92b6da6f9">
        </div>
        <div title="Wiley" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 63%" data-link="booth/e86fe472-6106-4f73-9da5-192e7aa7766f">
        </div>
        <div title="McGlinchey" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 51%" data-link="booth/d4c074a8-66d6-4312-b91c-993849e2d920">
        </div>
        <div title="Mintz" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 38%" data-link="booth/f89b9ab4-475c-4224-ba05-37976af265c2">
        </div>
         <div title="Winston & Strawn LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 28%" data-link="booth/279e9ebc-b366-4541-8d32-c0ed1ed984ef">
        </div>
        <div title="Reddock Law Group" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 16%" data-link="booth/0fd80930-9701-4ef7-b252-b4a7342bcd54">
        </div>
        <div title="Wilson Turner Kosmo LLP" class= "area candidate-booth positioned" style="width: 9%;  height: 16%;   top: 59%;  left: 4%" data-link="booth/b66d4a7b-bf1f-40fd-812c-f871b8371dbd">
        </div>
         {!! getScavengerItems("room1") !!} 
     </div> 
 </div> 