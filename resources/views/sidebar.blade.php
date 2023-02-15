<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('font-awesome.min.css') }}">

<nav class="navbar bg-light" style="padding: 60px;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.index') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('department.index') }}">Departments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('course.index') }}">Course of Study</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('curriculum.create') }}">Curriculum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.create') }}">Attendance</a>
        </li>
    </ul>
</nav>
