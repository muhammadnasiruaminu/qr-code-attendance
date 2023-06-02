<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join Attendance</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <style>

        body{
            background-image: url('{{ asset('brickwall.png') }}')
        }

        #container {
            margin: 0px auto;
            width: 500px;
            height: 375px;
            border: 5px #333 solid;
        }

        #videoElement {
            width: 500px;
            height: 375px;
            background-color: #666;
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
                            <video autoplay="true" id="videoElement">

                            </video>
                            <a href="{{ route('student.index') }}" class="btn btn-info btn-sm float-right">Back</a>
                        </div>


                    </div>


                </div>

            </div>

        </div>
    </div>

    <script>
        var video = document.querySelector("#videoElement");

        if (navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
            video.srcObject = stream;
            })
            .catch(function (err0r) {
            console.log("Something went wrong!");
            });
        }

        function stop(e) {
        var stream = video.srcObject;
        var tracks = stream.getTracks();

        for (var i = 0; i < tracks.length; i++) {
            var track = tracks[i];
            track.stop();
        }

        video.srcObject = null;
        }
    </script>
</body>
</html>
