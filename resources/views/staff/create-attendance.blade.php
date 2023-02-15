<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Attendance</title>
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
                        <div class="">
                            <h4 class="float-left">Generate Attendance</h4>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">Generate</button>
                        </div>

                        {{-- {{$createdAtt}} --}}

                        <div class="table-responsive">
                            <table class="table table-striped table-hover mt-5">
                                <thead>
                                  <tr>
                                    <th>S/No</th>
                                    <th>Course</th>
                                    <th>Start</th>
                                    <th>Ends</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th class="text-center" colspan="3">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($createdAtt as $i => $crtA)
                                    {{-- <a href=""> --}}
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>
                                                {{-- @foreach ($crtA->curriculum as $inner)
                                                {{$inner->course_code}}
                                                @endforeach --}}
                                                {{-- I commented this because it's using 'CreateAttendance hasMany Curriculum' in
                                                 it relationship, yanzu kuma I'm using HasOne --}}

                                                 {{$crtA->curriculum->course_code}}
                                            </td>
                                            <td>{{$crtA->starts_at}}</td>
                                            <td>{{$crtA->ends_at}}</td>
                                            <td>{{$crtA->active_status == '1' ? "Open" : "Closed"}}</td>
                                            <td>{{$crtA->created_at}}</td>
                                            {{-- <td>
                                              <a href="#attendStatus{{$crtA->uuid}}" data-toggle="modal">Open</a>
                                            </td> --}}
                                           
                                            <td>
                                              <a href="{{ route('attendance.qrcode', $crtA->uuid) }}">View</a>
                                            </td>
                                            <td>
                                              <a href="{{ route('join.attendance.create', $crtA->uuid) }}">List</a>
                                            </td>
                                            {{-- <div class="modal" id="attendStatus{{$crtA->uuid}}">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Attendance</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                      <div class="visible-print text-center">
                                                        {!! QrCode::format('svg')->size(200)->generate('Course code: '.$crtA->curriculum->course_code.  ' Starts: '. $crtA->starts_at. ' Ends at: '. $crtA->ends_at); !!}
                                                      </div>
                                                      <div class="pull-right">
                                                          <form action="{{ route('attendance.startAttendance', $crtA->uuid) }}" method="post">
                                                            @csrf
                                                            <button class="btn" >Start</button>
                                                          </form>
                                                          <form action="{{ route('attendance.stopAttendance', $crtA->uuid) }}" method="post">
                                                            @csrf
                                                            <button class="btn">Stop</button>
                                                          </form>
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                  </div>
                                                </div>
                                              </div> --}}
                                        </tr>
                                    {{-- </a> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>


                </div>

            </div>

        </div>
    </div>

    {{-- beginning of modal for creating attendance --}}
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="" method="POST">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Attendance</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="">Course Code</label>
                                <select name="course_code"  class="form-control" id="">
                                    <option value="">-- course code --</option>
                                    @foreach ($curriculum as $curr)
                                    <option value="{{$curr->uuid}}">{{$curr->course_code}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Starts</label>
                                <input type="time" class="form-control" name="starts_at" value="">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="">Ends</label>
                                <input type="time" class="form-control" name="ends_at" value="">
                            </div>
                        </div>

                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div class="col-12">
                            <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary float-right ">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    {{-- end of modal  --}}

   
</body>
</html>
