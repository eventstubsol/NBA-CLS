<div class="modal fade theme-modal" id="booth_directory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            @foreach ($boothrooms as $id => $room)
            <div class="boothroomlist">
                {{$room->name}}
                @if(isset($room->booth) && is_array($room->booth) && count($room->booths))
                        @foreach($room->booths as $booth)
                            <div class="boothroom">
                                <a data-link="booth/{{ $booth->id }}">
                                    <p>{{ $booth->name }}</p>
                                </a>
                            </div>
                        @endforeach
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>