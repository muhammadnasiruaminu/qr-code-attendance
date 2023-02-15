<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authenticate Attendance</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <style>

        body{
            background-image: url('{{ asset('brickwall.png') }}')
        }

        aaaa#container {
            margin: 0px auto;
            width: 500px;
            height: 375px;
            border: 5px #333 solid;
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
                        <div id="container">
                           
                            <a href="{{ route('user.index') }}" class="btn btn-info btn-sm float-right">Back</a>
                        </div>


                    </div>


                </div>

            </div>

        </div>
    </div>

    
</body>
</html>
