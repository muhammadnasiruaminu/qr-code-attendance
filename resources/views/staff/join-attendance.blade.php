<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attendance List</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap.min.js')}}"></script>
    <style>
        body{
            background-image: url('{{ asset('brickwall.png') }}')
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3 " style="padding:20px; background-color:#f8f9fa;">
                @include('sidebar')

            </div>

            <div class="col-md-1"></div>

            <div class="col-md-8 bg-light" style="padding:20px; background-color:#f8f9fa;">
                @include('messages')
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="col-12 ">
                            <a class="btn" href="{{ route('attendance.create') }}">Back</a>
                        </div>
                        <div class="text-center">
                            <h3>{{$course->curriculum->course_code}} Attendance List</h3>
                        </div>
                        <div class="col-12 ">
                            {{-- @foreach ($course->curriculum as $item)
                                <h4 class="float-left">List of Attendees for {{$item->course_code}}</h4>
                            @endforeach --}}
                            {{-- <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">Start Attendance</button> --}}
                        </div>


                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5">
                                <thead>
                                  <tr>
                                    <th>S/No</th>
                                    <th>Names</th>
                                    <th>Reg. Number</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($attendees as $i => $list)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{ $list->names }}</td>
                                            <td>{{$list->registration_number}}</td>
                                            <td>
                                                @foreach ($list->createAttendance as $item)
                                                    {{ $item->curriculum->course_code }}
                                                @endforeach
                                            </td>
                                            {{-- <td><button onclick="confirm('are u sure')">del</button></td> --}}
                                            <td>
                                                <button class="btn text-danger" data-toggle="modal" data-target="#confirmDel{{ $i }}">Delete</button>
                                                <div class="modal" id="confirmDel{{ $i }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5>Confirm deletion</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h5>Are you sure you want to delete <b>{{ $list->registration_number }}</b>?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn" data-dismiss="modal">No</button>
                                                                <a href="{{ route('join.attendance.destroy', $list->uuid) }}" class="btn">Yes</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            {{-- <td><a href="{{ route('join.attendance.destroy', $list->uuid) }}">Delete</a></td> --}}
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
