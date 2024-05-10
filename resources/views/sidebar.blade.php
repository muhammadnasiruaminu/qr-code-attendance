<script src="{{asset('jquery.min.js')}}"></script>
<script src="{{asset('bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('font-awesome.min.css') }}">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">

<nav class="navbar bg-light" style="padding: 60px;">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.index') }}"> <span class="fa fa-dashboard"> Dashboard</span> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.users') }}"> <span class="fa fa-users"> Users</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('faculty.index') }}"><span class="fa fa-home"> Faculties</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('department.index') }}"><span class="fa fa-graduation-cap">Departments</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('course.index') }}"><span class="fa fa-book"> Programme</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('curriculum.create') }}"><span class="fa fa-book"> Curriculum</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('attendance.create') }}"><span class="fa fa-clock-o"> Attendance</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('staff.uploadStudentsPage') }}"><span class="fa fa-upload">Upload Students</span></a>
        </li>
    </ul>
</nav>
