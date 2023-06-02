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
                {{-- @include('sidebar') --}}

            </div>

            <div class="col-md-1"></div>

            <div class="col-md-8 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 float-left">
                                <h4>Welcome Back </h4>
                            </div>
                            <div class="col-md-6"><a href="{{ route('student.logout') }}" class="btn float-right">Logout</a></div>

                                <div class="col-md-6 ">
                                    <h3>Student Details</h3>

                                    <table border="0" width="450px;" height="100px;">
                                        <tr>
                                            <td>Names:</td>
                                            <td><b>{{ Auth::guard('student')->user()->names}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Registration Number:</td>
                                            <td><b>{{ Auth::guard('student')->user()->registration_number}}</b></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><b>{{Auth::guard('student')->user()->email}}</b></td>
                                        </tr>
                                    </table>
                                    <br>
                                </div>

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <h3>Available lectures</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5">
                                <thead>
                                  <tr>
                                    <th>S/No</th>
                                    <th>Course Code</th>
                                    <th>Starts</th>
                                    <th>Ends</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach ($activeClassess as $i => $class)

                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                {{-- @foreach ($class->curriculum as $inner)
                                                {{$inner->course_code}}
                                                @endforeach --}}
                                                {{$class->curriculum->course_code}}
                                            </td>
                                            <td>{{$class->starts_at}}</td>
                                            <td>{{$class->ends_at}}</td>
                                            <td>{{$class->created_at}}</td>
                                            <td>
                                                <a href="{{ route('student.openCamera') }}" class="btn btn-info btn-sm float-right">Join class</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
</body>
</html>
