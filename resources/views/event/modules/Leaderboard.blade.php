<div class="page has-padding padding-large menu-filled" id="leaderboard">
    <div class="container-fluid">
        <div class="wrapper">
            <div class="points">
                <div class="d-block mb-4">
                    <div class="wrap-title">
                        <h2>Point System</h2>
                    </div>
                    <div class="wrap-content">
                        <ul>
                            <li>Event Login</li>
                            <li> Viewing an On-demand Video</li>
                            <li> Viewing a document in the library</li>
                            <li> Viewing a live streaming</li>
                            <li> Visiting a booth</li>
                        </ul>
                    </div>
                </div>
                <div class="d-block">
                <div class="wrap-title">
                    <h2>Prizes - To be announced at a later date</h2>
                    <p class="pr-text"></p>
                </div>
                <div class="carousel slide h-100" id="prizes" data-ride="carousel">

                    <div class="carousel-inner h-100">
                        @foreach($prizes as $id=>$prize)
                            <div class="carousel-item h-100 @if($id==0) active @endif">
                                @foreach($prize->images as $image)
                                    <img class="d-block img-fluid h-100 w-100" style="object-fit:cover;" src="{{assetUrl($image->url)}}"
                                    alt="First slide"/>
                                    @break
                                @endforeach
                                    <div class="carousel-caption d-none d-md-block corouselcap">
                    {{--                                                <h5 class="text-white">{{$prize->title}}</h5>--}}
                    {{--                                                <p>{!! $prize->description !!}</p>--}}
                                    </div>
                            </div>
                        @endforeach
                            <a class="carousel-control-prev" href="#prizes" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#prizes" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                    </div>
                    <div class="wrap-content">
                           <div class="row">
                            <div class="col-md-12 pt-3">
                                <p class="mb-2">Powered by</p>
                                <img class="img-fluid mb-2" src="https://congress2021web.fra1.digitaloceanspaces.com/uploads/uwCgMTfvSYpiTSQFyLT2caG2lUww3GOX58iA4unX.png" alt="NBA-CLS">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scores">
                <div class="wrap-title">
                    <h2>Scoreboard</h2>
                </div>
                <div class="wrap-content scores-list-wrap" data-simplebar>
                    <ol id="list-of-people" class="score-list">

                    </ol>
                </div>
            </div>
        </div>

    </div>
</div>