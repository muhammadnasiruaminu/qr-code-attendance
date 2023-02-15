<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course of Study</title>
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
                <div class="row ">
                    <div class="col-md-12">
                        <div class="float-right">
                            <a href="{{ route('course.index') }}" class="btn">View</a>
                        </div>
                    </div>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="">Department</label>
                            <select name="department" class="form-control" id="">
                                <option value="">-- select Department --</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->uuid }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Course of Study/Programme</label>
                            <input type="text" class="form-control" name="courseName">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="">Duration</label>
                            <input type="text" class="form-control" name="duration">
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
