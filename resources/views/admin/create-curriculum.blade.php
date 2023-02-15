<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curriculum</title>
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
                            <label for="">Course Code</label>
                            <input type="text" class="form-control" name="courseCode" value="">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Course Title</label>
                            <input type="text" class="form-control" name="courseTitle" value="">
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="">Credit Unit</label>
                            <select name="creditUnit"  class="form-control" id="">
                                <option value="">-- course unit --</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
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
