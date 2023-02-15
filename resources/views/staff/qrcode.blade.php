<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Attendance</title>
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

                    <div class="col-12"><a href="{{ route('attendance.create') }}" class="btn float-left">Back</a></div>
                    <div class="col-md-12 col-sm-12">
                        <div class="">
                         {{'Course code: '.$attend_qr->curriculum->course_code.  ' Starts: '. $attend_qr->starts_at. ' Ends at: '. $attend_qr->ends_at}} <br> <br>
                            <div class="visible-print text-center">
                                {!! QrCode::format('svg')->size(300)->generate($attend_qr->token); !!}  
                                {{-- {!! QrCode::format('svg')->size(300)->generate('Course code: '.$attend_qr->curriculum->course_code.  ' Starts: '. $attend_qr->starts_at. ' Ends at: '. $attend_qr->ends_at); !!}   --}}
                            </div>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <a class="btn" href="{{ route('attendance.startAttendance', $attend_qr->uuid) }}">Start</a>
                                        {{-- <form action="{{ route('attendance.startAttendance', $attend_qr->uuid) }}" method="post">
                                            @csrf
                                            <button class="btn" >Start</button>
                                        </form> --}}
                                    <form action="{{ route('attendance.stopAttendance', $attend_qr->uuid) }}" method="post">
                                        @csrf
                                        <button class="btn">Stop</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
    </div>
</body>
</html>
