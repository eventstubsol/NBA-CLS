<div class="sidebar-custom navs hidden theme-nav">
    <div class="scroller" data-simplebar>
        <ul class="menu">
            <li>
                <a class="area" data-link="auditorium">
                    <i class="menu-icon live"></i>
                    Live now
                </a>
                <ul>
                    <li>
                        <a class="area dropdown-item" data-link="sessionroom/Auditorium">Impact Auditorium</a>
                    </li>
                    <li>
                        <a class="area dropdown-item" data-link="sessions-list/peek_behind_corporate_veil">Peek Behind The Corporate Hall</a>
                    </li>
                    <li>
                        <a class="area dropdown-item" data-link="sessions-list/fireside_chat">Fireside Chat</a>
                    </li>
                </ul>
            </li>        
            <li class="custom-dropdown">
                <a  class="area">
                    <i class="menu-icon expo"></i>
                    Expo Hall
                </a>
                <ul >
                    <li>
                        <a class="area dropdown-item" data-link="room/ca9d92bd-e5a1-4392-9659-b65d9c857310">Walker Expo Hall</a>
                    </li>
                    <li>
                        <a class="area dropdown-item" data-link="room/d4021162-16a5-43a2-aba1-005ac9507717">Lewis Expo Hall</a>
                    </li>
                </ul>
            </li>
            <li >
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
            <li><a href="javascript:void(0);" data-link="infodesk" class="area"><i class="fe-info"></i>Info Desk</a></li>   
            <li><a href="javascript:void(0);" data-link="lobby" class="area"><i class="fe-home"></i>Lobby</a></li>
            <li><a data-toggle="modal" data-target="#resources-modal"><i class="fe-folder"></i>Library</a></li>
            <li><a data-toggle="modal" data-target="#schedule-modal"><i class="fe-calendar"></i>Schedule</a></li>
            <li><a data-toggle="modal" data-target="#swagbag-modal"><i class="fe-shopping-bag"></i>Briefcase</a></li>
            <li><a class="area" data-link="leaderboard"><i class="fe-bar-chart"></i>Leaderboard</a></li>
            <li>
                <a class="area" data-link="attendees"><i class="fe-users"></i>Attendees</a>
            </li>
            <li><a data-toggle="modal" id="agenda" data-target="#personal-schedule-modal"><i class="fe-calendar"></i>Personal Agenda</a></li>
             

        </ul>
    </div>
</div>
<!-- end Topbar -->