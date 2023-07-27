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

                <div class="">
                    <div class="float-right">
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#curriculumModal">Create</button>
                    </div>
                    <h3>Courses/Curricula</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mt-5">
                            <thead>
                              <tr>
                                <th>S/No</th>
                                <th>Course Code</th>
                                <th>Title</th>
                                <th>Unit(s)</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($curricula as $i => $curriculum)
                                    <tr>
                                        <td>{{++$i}}</td>
                                        <td>{{$curriculum->course_code}}</td>
                                        <td>{{$curriculum->course_title}}</td>
                                        <td>{{$curriculum->course_unit}}</td>
                                        <td>{{$curriculum->created_at}}</td>
                                        <td>
                                            <button class="btn" data-target="#editCurriculumModal{{ $curriculum->uuid }}" data-toggle="modal"><span class="fa fa-edit text-primary">edit</span></button>
                                            <!-- update curriculum mosdal -->
                                            <div class="modal" id="editCurriculumModal{{ $curriculum->uuid }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('curriculum.update', $curriculum->uuid) }}" method="POST">
                                                            @csrf
                                                            <!-- Modal Header -->
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Edit Curriculum</h4>
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            </div>

                                                            <!-- Modal body -->
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">Course Code</label>
                                                                        <input type="text" class="form-control" name="courseCode" value="{{ $curriculum->course_code }}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">Course Title</label>
                                                                        <input type="text" class="form-control" name="courseTitle" value="{{ $curriculum->course_title }}">
                                                                    </div>

                                                                    <div class="col-md-12 form-group">
                                                                        <label for="">Credit Unit</label>
                                                                        <select name="creditUnit"  class="form-control" id="">
                                                                            <option value="{{ $curriculum->course_unit }}">{{ $curriculum->course_unit }}</option>
                                                                            {{-- <option value="">-- course unit --</option> --}}
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                            <option value="6">6</option>
                                                                        </select>
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>

        </div>
    </div>
    <!-- create curriculum mosdal -->
    <div class="modal" id="curriculumModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    @csrf
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create Curriculum</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
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

</body>
</html>
