<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Departments</title>
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
                                <a href="{{ route('department.create') }}" class="btn btn-primary">Create</a>
                            </div>
                            <h3>Departments</h3>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mt-5">
                                    <thead>
                                      <tr>
                                        <th>S/No</th>
                                        <th>Name</th>
                                        <th>Initial</th>
                                        <th>Faculty</th>
                                        <th>Created Date</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $i => $department)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$department->department_name}}</td>
                                                <td>{{$department->department_initial}}</td>
                                                <td>{{$department->faculty}}</td>
                                                <td>{{$department->created_at}}</td>
                                                <td>
                                                    <button class="btn" data-toggle="modal" data-target="#editDepartmentModal{{ $department->uuid }}"><span class="text-primary">edit</span></button>
                                                </td>
                                                <!-- edit department mosdal -->
                                                    <div class="modal" id="editDepartmentModal{{ $department->uuid }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('department.update', $department->uuid) }}" method="POST">
                                                                    @csrf
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Department</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Department Name</label>
                                                                                <input type="text" class="form-control" name="departmentName" value="{{$department->department_name}}">
                                                                            </div>
                                                    
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Department Initial</label>
                                                                                <input type="text" class="form-control" name="departmentInitial" value="{{$department->department_initial}}">
                                                                            </div>
                                                    
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="">Faculty</label>
                                                                                <input type="text" class="form-control" name="faculty" value="{{$department->faculty}}">
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
