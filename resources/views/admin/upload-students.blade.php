<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploads</title>
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
                    <div class="">
                        <div class="">
                            <h3>Upload Students</h3>
                            <div class="row">
                                <div class="col-6">
                                    <form action="{{ route('staff.uploadStudents') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" name="file" id="" class="form-control form-group">
                                        <input type="submit" value="upload" name="" id="" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5">
                                <thead>
                                    <tr>
                                        <th>S/No</th>
                                        <th>Names</th>
                                        <th>Registration No</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($uploads as $i => $studs)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $studs->names }}</td>
                                            <td>{{ $studs->registration_number }}</td>
                                            <td>{{ $studs->level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

            </div>

        </div>
    </div>
</body>
</html>
