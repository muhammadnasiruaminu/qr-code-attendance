<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap.min.js')}}"></script>
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

                    <div class="col-12"><strong>Staff Dashboard</strong><a href="{{ route('staff.login') }}" class="btn float-right">Logout</a></div>
                    <div class="col-md-8 col-sm-12">
                        <h4>Welcome Back {{ $loggedStaffInfo ? $loggedStaffInfo->full_name : null}}</h4> <br>
                        <!-- {{$loggedStaffInfo}} -->

                        <div class="container">
                            <!-- Department:   <br> -->
                            <table border="0" width="450px;" height="100px;">
                                <tr>
                                    <td>Names:</td>
                                    <td><b>{{ $loggedStaffInfo ? $loggedStaffInfo->full_name : null}}</b></td>
                                </tr>
                                <tr>
                                    <td>PSN:</td>
                                    <td><b>{{ $loggedStaffInfo ? $loggedStaffInfo->psn : null}}</b></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><b>{{$loggedStaffInfo ? $loggedStaffInfo->email : null}}</b></td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    <td><b>{{$loggedStaffInfo ? $loggedStaffInfo->phone_number : null}}</b></td>
                                </tr>
                                {{-- <tr>
                                    <td>Department:</td>
                                    <td><b>{{$loggedStaffInfo ? $loggedStaffInfo->phone_number : null}}</b></td>
                                </tr> --}}
                            </table>
                        </div>



                    </div>


                </div>

            </div>

        </div>
    </div>
</body>
</html>
