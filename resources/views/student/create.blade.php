<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
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
                {{-- <nav class="navbar bg-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link 3</a>
                        </li>
                    </ul>
                </nav> --}}
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-8 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Full Name</label>
                            <input type="text" class="form-control" name="fullName" value="{{$stud->full_name}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Registration Number</label>
                            <input type="text" class="form-control" name="regNumber" value="{{$stud->reg_number}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" value="{{$stud->email}}">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phoneNumber" value="">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Level</label>
                            <input type="text" class="form-control" name="level" value="">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Course of Study</label>
                            <select class="form-control" name="courseOfStudy" id="">
                                <option value="">-- select course --</option>
                                @foreach ($key as $item)
                                    <option value="{{$item->uuid}}">{{$item->course_of_study}}</option>
                                @endforeach
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
