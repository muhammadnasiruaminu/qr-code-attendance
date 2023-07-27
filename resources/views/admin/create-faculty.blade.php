<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Faculty</title>
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
                        <div class="col-md-6 form-group">
                            <label for="">Faculty Name</label>
                            <input type="text" class="form-control" name="facultyName">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Faculty Initial</label>
                            <input type="text" class="form-control" name="facultyInitial">
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right ">Save</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>
</body>
</html>
