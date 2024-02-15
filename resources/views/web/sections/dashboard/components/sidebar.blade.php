<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
         aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                    aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard')?'text-black':'text-blue'}}" aria-current="page" href="/dashboard">
                        <svg class="bi">
                            <use xlink:href="#house-fill"/>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/student*')?'text-black':'text-blue'}}" href="/dashboard/student">
                        <svg class="bi">
                            <use xlink:href="#file-earmark"/>
                        </svg>
                        Student
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/kelas*')?'text-black':'text-blue'}}" href="/dashboard/kelas">
                        <svg class="bi">
                            <use xlink:href="#cart"/>
                        </svg>
                        Kelas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/ekstrakurikuller*')?'text-black':'text-blue'}}" href="/dashboard/ekstrakurikuller">
                        <svg class="bi">
                            <use xlink:href="#cart"/>
                        </svg>
                        ExtraKurikuller
                    </a>
                </li>

            </ul>


            @can("admin")
                <h6 class   ="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <span>Admin Management </span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <svg class="bi">
                            <use xlink:href="#plus-circle"/>
                        </svg>
                    </a>
                </h6>
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item ">
                        <a class="nav-link d-flex align-items-center gap-2 {{Request::is('dashboard/user*')?'text-black':'text-blue'}}" href="/dashboard/user">
                            <svg class="bi">
                                <use xlink:href="#file-earmark-text"/>
                            </svg>
                            User
                        </a>
                    </li>
                </ul>

            @endcan


            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 " href="/home">
                        <svg class="bi">
                            <use xlink:href="#house-fill"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li class="nav-item">

                    <form action="/logout" method="post">
                        @csrf


                        <button type="submit" class="nav-link d-flex align-items-center gap-2 ">

                            <a class="text-decoration-none {{Request::is('logout')?'text-black':'text-blue'}}" >
                                <svg class="bi">
                                    <use xlink:href="#door-closed"/>
                                </svg>
                                Sign out
                            </a>
                        </button>
                    </form>


                </li>
            </ul>
        </div>
    </div>
</div>