<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check User</title>
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
            {{-- <div class="col-md-3" style="padding:20px; background-color:#f8f9fa;">
                @include('sidebar')
            </div> --}}

            {{-- <div class="col-md-1"></div> --}}

            <div class="col-md-4 p-5 offset-md-4 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <form action="" method="POST">
                    @csrf



                        <div class="col-md-12 form-group">
                            <label for="">Registration Number</label>
                            <input type="text" class="form-control" name="registrationNumber">
                        </div>
                        <div class="col-md-12">
                            <a href="{{ route('student.login') }}">Login</a>
                            <button class="btn btn-primary float-right ">Check</button>
                        </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
