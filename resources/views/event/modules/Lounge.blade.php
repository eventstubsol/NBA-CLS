<div class="page" id="lounge-page">
    <div style="position: relative; height:100vh">
        <img src="{{ assetUrl(getField("networkingLounge")) }}" class="positioned booth-bg" alt="" />
        @foreach(LOUNGE_AREAS as $area)
            <div
                    title="{{ $area['title'] }}"
                    class="positioned area"
                    data-link="{{ $area['link'] }}"
                    style="{{ areaStyles($area["area"]) }}"></div>
        @endforeach
        {!! getScavengerItems("lounge") !!}
    </div>
</div>