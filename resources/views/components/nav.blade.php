
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Negaz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{Request::is('home')?'active':''}}" aria-current="page"
                       href="/home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{Request::is('about')?'active':''}}" aria-current="page" href="/about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{Request::is('student')?'active':''}}" aria-current="page"
                       href="/student">Student</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{Request::is('kelas')?'active':''}}" aria-current="page" href="/kelas">Kelas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link  {{Request::is('ekstrakurikuller')?'active':''}}" aria-current="page" href="/ekstrakurikuller">Ekstrakurikuller</a>
                </li>
            </ul>


            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welcome back, {{auth()->user()->name}}
                        </a>
                        <ul class="dropdown-menu">


                                <li><a class="dropdown-item" href="/dashboard">My Dashboard</a></li>



                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-left"></i>  Logout</button>

                                </form>
                            </li>

                            {{--                            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-in-left"></i>  Logout</a></li>--}}
                        </ul>
                    </li>
                @else



                    <li class="nav-item">

                        <a class="nav-link" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </li>

                @endauth
            </ul>




        </div>
    </div>
</nav>
