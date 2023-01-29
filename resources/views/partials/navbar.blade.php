<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/">{{config('app.name')}}</a>
    <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('student.index')}}">Students</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('student.department')}}">Department</a>
                </div>
            </li>
        </ul>
            @if (Auth::check())
                    <a class="nav-link text-white" href="{{route('user.logout')}}">Logout</a>
            @else
                    <a class="nav-link text-white" href="{{route('login')}}">Login</a>
            @endif
    </div>
</nav>