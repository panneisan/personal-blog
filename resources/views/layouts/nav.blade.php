
    <div class="aside-left bg-white px-3 pb-2 min-vh-100 shadow">
        <ul class="menu" style="list-style-type: none">
            <li class="brand-icon">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset(\App\Custom::$info['c-logo']) }}" class="brand-icon-img">
                        <small class="text-primary font-weight-bold h5 mb-0 ml-2">{{ \App\Custom::$info['short_name'] }}</small>
                    </div>
                    <button class="btn btn-light d-block d-lg-none aside-menu-close">
                        <i class="feather-x fa-2x"></i>
                    </button>
                </div>
            </li>
            <li>
                <a class="menu-item mt-3" href="{{route("dashboard")}}">
                    <span>
                        <i class="feather-home mr-1"></i>
                        Dashboard
                    </span>
                </a>
            </li>
            <li>
                <div class="my-5"></div>
            </li>
            <li>
                <h5 class="text-secondary">
                    Skill Management
                </h5>
            </li>
            <li>
                <a class="menu-item" href="{{route('skill.create')}}">
                    <span>
                        <i class="feather-user-plus mr-1"></i>
                        Add Skill
                    </span>

                </a>
                <a class="menu-item" href="{{route('skill.index')}}">
                    <span>
                        <i class="feather-list mr-1"></i>
                        Skill List
                    </span>
                    <span class="badge badge-pill badge-light shadow-sm">
                        {{ \App\Skill::count() }}
                    </span>


                </a>
            </li>
            <li>
                <div class="my-5"></div>
            </li>
            <li>
                <h5 class="text-secondary">
                    Project Management
                </h5>
            </li>
            <li>
                <a class="menu-item" href="">
                    <span>
                        <i class="feather-user-plus mr-1"></i>

                    </span>

                </a>
                <a class="menu-item" href="">
                    <span>
                        <i class="feather-user-plus mr-1"></i>
                    </span>

                </a>
            </li>
            <li>
                <div class="my-5"></div>
            </li>





            <li>
                <a class="menu-item alert-danger text-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="#">
                    <span>
                        <i class="fas fa-lock"></i>
                        Logout
                    </span>
                </a>
            </li>
        </ul>
    </div>



