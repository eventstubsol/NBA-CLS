<div class="page" id="lounge-page">
    <div style="position: relative; height:100vh">
        <img src="{{ assetUrl(getField("networkingLounge")) }}" class="positioned booth-bg" alt="" />
        @foreach(LOUNGE_AREAS as $area)
            @if(isset($area['zoom_url']))
            <a title="{{ $area['title']}}" 
                class="positioned"
                style="{{ areaStyles($area['area']) }}"
                href="{{ $area['zoom_url'] }}"
                target="_blank"
            ></a>

            @else
            <div
                    title="{{ $area['title'] }}"
                    class="positioned area"
                    data-link="{{ $area['link'] }}"
                    style="{{ areaStyles($area["area"]) }}"></div>
            @endif
        @endforeach
        {!! getScavengerItems("lounge") !!}
    </div>
</div>