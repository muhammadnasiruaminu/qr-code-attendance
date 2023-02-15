<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <style>
        body{
            background-image: url('{{ asset('brickwall.png') }}')
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 " style="padding:20px; background-color:#f8f9fa;">
                @include('sidebar')

            </div>

            <div class="col-md-1"></div>

            <div class="col-md-8 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <h4>Welcome Back </h4>
                        @foreach ($key as $item)
                            <h3>{{$item->full_name}}!</h3>
                            <ul class="list-group">
                                <li class="list-group-item"><p>Course of Study: {{$item->courseOfStudy->course_of_study}}</p></li>
                                <li class="list-group-item"><p>Registration Number: {{$item->reg_number}}</p></li>
                                <li class="list-group-item"><p>Email: {{$item->email}}</p></li>
                                <li class="list-group-item"><p>Phone Number: {{$item->phone_number}}</p></li>
                                <li class="list-group-item"><p>Level: {{$item->level}}</p></li>

                            </ul>
                        @endforeach
                    </div>
                    <div class="col-md-6 col-sm-12">
                        {{-- <p>Student Details</p> --}}
                        <p>Current Lecture: <b>COSC 401</b></p>
                        <button class="btn btn-info btn-sm float-right">Join class</button>
                    </div>

                </div>

            </div>

        </div>
    </div>
</body>
</html>
