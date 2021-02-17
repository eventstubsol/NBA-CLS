<div class="menu-custom navs hidden theme-nav">
    <div class="container-fluid row">
        <ul class="menu">
            <li class="custom-dropdown not-booth-menu">
                <a class="area">
                    <i class="menu-icon live"></i>
                    Live now
                </a>
                <div class="custom-dropdown-menu">
                        <a class="area dropdown-item" data-link="sessionroom/Auditorium">Impact Auditorium</a>
                        <a class="area dropdown-item" data-link="sessions-list/peek_behind_corporate_veil">Peek Behind The Corporate Hall</a>
                        <a class="area dropdown-item" data-link="sessions-list/fireside_chat">Fireside Chat</a>
                </div>
            </li>
            <li class="custom-dropdown not-booth-menu">
                <a  class="area">
                    <i class="menu-icon expo"></i>
                    Expo Hall
                </a>
                <div class="custom-dropdown-menu">
                        <a class="area dropdown-item" data-link="room/ca9d92bd-e5a1-4392-9659-b65d9c857310">Walker Expo Hall</a>
                        <a class="area dropdown-item" data-link="room/d4021162-16a5-43a2-aba1-005ac9507717">Lewis Expo Hall</a>
                </div>
            </li>
            <li class="custom-dropdown not-booth-menu" >
                <a class="area" data-link="attendees"><i class="fe-users"></i>Attendees</a>
            </li>
            <!-- <li class="custom-dropdown not-booth-menu">
                <a  class="area" data-link="workshop-list">
                    <svg class="menu-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 510 510" fill="currentColor"><path d="M495.523 121.677c-.959-.033-20.656-.698-49.57-.059V62.336c0-8.739-7.462-15.67-16.248-14.948C372.053 52.201 298.704 77.676 255 124.141c-43.704-46.465-117.053-71.94-174.705-76.753-8.77-.714-16.248 6.186-16.248 14.948v60.885c-16.428-.62-31.967-1.057-48.602-1.546C7.055 121.41 0 128.168 0 136.668v273.17c0 7.894 6.117 14.437 13.993 14.966 59.668 4.016 159.617 4.468 235.123 36.672 6.729 2.874 12.77-.427 11.77 0 75.504-32.203 175.435-32.654 235.123-36.672 7.875-.529 13.993-7.072 13.993-14.966v-273.17c-.002-8.081-6.403-14.709-14.479-14.991zm-79.57-42.47v257.088C372.697 345.971 317.878 366.619 270 410.4V152.563c32.82-40.95 94.976-65.632 145.953-73.356zm-321.906 0C145.024 86.931 207.18 111.613 240 152.563V410.4c-47.878-43.781-102.697-64.429-145.953-74.105zM30 395.723V152.116c10.741.318 22.229.677 34.047 1.128v195.277a15 15 0 0012.233 14.742c34.251 6.429 78.791 20.383 120.303 50.429C137.358 400.409 75.366 398.274 30 395.723zm450 0c-45.292 2.547-107.335 4.68-166.584 17.969 41.512-30.046 86.053-44 120.303-50.429a15 15 0 0012.233-14.742V151.628c13.806-.309 25.565-.313 34.047-.236v244.331z"></path><path d="M201.107 187.116c-11.618-8.094-31.647-18.029-53.022-21.641-8.165-1.386-15.909 4.123-17.29 12.291-1.38 8.168 4.123 15.909 12.292 17.289 16.503 2.789 32.331 10.726 40.871 16.676 6.795 4.734 16.145 3.066 20.882-3.733 4.735-6.797 3.064-16.147-3.733-20.882zM199.605 271.586c-10.689-6.527-31.596-17.981-51.52-21.348-8.165-1.384-15.909 4.122-17.29 12.291-1.38 8.169 4.123 15.909 12.292 17.289 15.521 2.623 33.76 13.021 40.881 17.371 7.079 4.321 16.307 2.079 20.62-4.983 4.318-7.07 2.087-16.301-4.983-20.62zM326.042 211.731c8.54-5.95 24.368-13.887 40.871-16.676 8.168-1.38 13.671-9.121 12.292-17.289-1.38-8.169-9.124-13.68-17.29-12.291-21.375 3.611-41.404 13.547-53.022 21.641-6.797 4.735-8.468 14.085-3.733 20.882 4.738 6.801 14.091 8.465 20.882 3.733zM361.915 250.239c-19.924 3.366-40.831 14.82-51.52 21.348-7.07 4.318-9.301 13.55-4.983 20.62 4.318 7.069 13.549 9.3 20.62 4.983 7.121-4.35 25.36-14.748 40.881-17.371 8.168-1.38 13.671-9.12 12.292-17.289-1.381-8.169-9.124-13.68-17.29-12.291z"></path></svg>
                    Special Courses
                </a>
            </li> -->
                <!-- <div class="custom-dropdown-menu">
                    @foreach(EXPO_HALL_ROOMS as $id)
                        <a class="area dropdown-item" data-link="room/{{ $id[0] }}">{{ $id[1] }}</a>
                    @endforeach
                </div> -->
            <li class="not-booth-menu">
                @if(isOpenForPublic("lounge"))
                    <a href="javascript:void(0);" class="area" data-link="lounge">
                        <i class="menu-icon lounge"></i>
                        Lounge
                    </a>
                @else
                    <a href="javascript:void(0);" class="area" disabled>
                        <i class="menu-icon lounge"></i>
                        Lounge
                    </a>
                @endif
            </li>
            <!-- <li class="not-booth-menu">
                <a href="javascript:void(0);" class="area" data-link="museum">
                    <i class="menu-icon delegates"></i>
                    Hall of Fame
                </a>
            </li> -->
            <li class="hidden" id="notbooth_menu_toggle" >
                <a href="javascript:void(0);" style="font-size: 22px">
                    <i class="mdi mdi-chevron-left-circle"></i>
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="description-modal-" class="modal-toggle booth_description">
                    <i class="mdi mdi-note-text" style="font-size: 22px;"></i>
                    Description
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="description-two-modal-" class="modal-toggle booth_description">
                    <i class="mdi mdi-note-text" style="font-size: 22px;"></i>
                    Lawfirm Members
                </a>
            </li>
            <!-- <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="videolist-modal-" class="modal-toggle booth_videos">
                    <i class="mdi mdi-play" style="font-size: 22px;"></i>
                    Videos
                </a>
            </li> -->
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" data-modal="resourcelist-modal-" class="modal-toggle booth_resources">
                    <i class="mdi mdi-file-pdf" style="font-size: 22px;"></i>
                    Resources
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);" class="show-interest">
                    <i class="mdi mdi-file-pdf" style="font-size: 22px;"></i>
                    Show Interest
                </a>
            </li>
            <li class="booth-menu hidden">
                <a href="javascript:void(0);"  data-modal="book-a-call-modal-" class="modal-toggle booth_call_booking">
                    <i class="mdi mdi-calendar" style="font-size: 22px;"></i>
                    Book a Call
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end Topbar -->