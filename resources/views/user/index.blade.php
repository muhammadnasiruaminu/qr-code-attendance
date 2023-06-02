<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
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
                                <a href="{{ route('staff.create') }}" class="btn btn-primary">Create</a>
                            </div>
                            <h3>Users</h3>
                            <div class="table-responsivecreate">
                                <table class="table table-striped table-hover mt-5">
                                    <thead>
                                      <tr>
                                        <th>S/No</th>
                                        <th>Names</th>
                                        <th>PSN</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $i => $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->full_name}}</td>
                                                <td>{{$user->psn}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone_number}}</td>
                                                <td>
                                                    <button class="btn" data-toggle="modal" data-target="#editUserModal{{ $user->uuid }}"><span class="text-primary">edit</span></button>
                                                </td>
                                                <!-- edit user modal -->
                                                    <div class="modal" id="editUserModal{{ $user->uuid }}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="{{ route('staff.update', $user->uuid) }}" method="POST">
                                                                  @method('PUT')
                                                                    @csrf
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit User</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12 form-group">
                                                                              <label for="psn">PSN</label>
                                                                              <input type="text" class="form-control" name="psn" value="{{$user->psn}}">
                                                                            </div>
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="names">Names</label>
                                                                                <input type="text" class="form-control" name="names" value="{{$user->full_name}}">
                                                                            </div>
                                                                            <div class="col-md-12 form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" class="form-control" name="email" value="{{$user->email}}">
                                                                            </div>
                                                                            <div class="col-md-12 form-group">
                                                                              <label for="phoneNumber">Phone Number</label>
                                                                              <input type="text" class="form-control" name="phoneNumber" value="{{$user->phone_number}}">
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
