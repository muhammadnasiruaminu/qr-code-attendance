<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
            <div class="col-md-3" style="padding:20px; background-color:#f8f9fa;">
                @include('sidebar')
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-8 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="fullName">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">PSN</label>
                            <input type="text" class="form-control" name="psn">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Phone Number</label>
                            <input type="number" class="form-control" name="phoneNumber" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary float-right ">Create</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
