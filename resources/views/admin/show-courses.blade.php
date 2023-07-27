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
                    <div class="">
                        <div class="">
                            <div class="float-right">
                                <a href="{{ route('course.create') }}" class="btn btn-primary">Create</a>
                            </div>
                            <h3>Course of Study/Programme</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mt-5">
                                    <thead>
                                      <tr>
                                        <th>S/No</th>
                                        <th>Department</th>
                                        <th>Programme</th>
                                        <th>Duration</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $i => $course)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$course->department ? $course->department->department_name : null}}</td>
                                                <td>{{$course->course_of_study}}</td>
                                                <td>{{$course->duration}}</td>
                                                <td>{{$course->created_at}}</td>
                                                <td>
                                                    <button class="btn" data-toggle="modal" data-target="#editDepartmentModal{{ $course->uuid }}"><span class="text-primary fa fa-edit">edit</span></button>
                                                </td>
                                                <!-- edit department mosdal -->
                                                    <div class="modal" id="editDepartmentModal{{ $course->uuid }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('course.update', $course->uuid) }}" method="POST">
                                                                    @csrf
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Programme</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Department</label>
                                                                                <select name="department" class="form-control" id="" required>
                                                                                    {{-- <option value="">-- select Department --</option> --}}
                                                                                    <option value="{{ $course->department_uuid }}">{{ $course->department ? $course->department->department_name : null }}</option>
                                                                                    @foreach ($departments as $department)
                                                                                        <option value="{{ $department->uuid }}">{{ $department->department_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                    
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Programme</label>
                                                                                <input type="text" class="form-control" name="courseName" value="{{ $course->course_of_study }}" required>
                                                                            </div>
                                                    
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Duration</label>
                                                                                <input type="text" class="form-control" name="duration" value="{{ $course->duration }}" required>
                                                                            </div>
                                                    
                                                                        </div>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <div class="col-12">
                                                                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                                                                            <button class="btn btn-primary float-right ">Update</button>
                                                                        </div>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

            </div>

        </div>
    </div>
</body>
</html>
