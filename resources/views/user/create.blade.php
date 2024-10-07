@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Add User')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Add User')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" name="name" value="{{old('name')}}" placeholder="Enter user name">
                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userSurName">Surname</label>
                        <input type="text" class="form-control" id="userSurName" name="surname" value="{{old('surname')}}" placeholder="Enter user surname">
                        @error('surname')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="text" class="form-control" id="userEmail" name="email" value="{{old('email')}}" placeholder="Enter user email">
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userPass">Password</label>
                        <input type="text" class="form-control" id="userPass" name="password" placeholder="Enter user password">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userPassConf">Password confirmation</label>
                        <input type="text" class="form-control" id="userPassConf" name="password_confirmation" placeholder="password">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userAge">Age</label>
                        <input type="text" class="form-control" id="userAge" name="age" value="{{old('age')}}" placeholder="Enter user age">
                        @error('age')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="userAddress">Address</label>
                        <input type="text" class="form-control" id="userAddress" name="address" value="{{old('address')}}" placeholder="Enter user address">
                        @error('address')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="custom-select form-control"  id="gender">
                            <option disabled selected>{{__('Gender')}}</option>
                            <option {{old('gender') == 1 ? ' selected' : ''}} value="1">Male</option>
                            <option {{old('gender') == 2 ? ' selected' : ''}} value="1">Female</option>
                        </select>
                    </div>
{{--                    <div class="form-group w-50">--}}
{{--                        <label>Role</label>--}}
{{--                        <select class="form-control" name="role">--}}
{{--                            @foreach($roles as $id => $role)--}}
{{--                                <option value="{{$id}}"--}}
{{--                                    {{$id == old('role') ? 'selected' : ''}}--}}
{{--                                >{{$role}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        @error('role')--}}
{{--                        <div class="text-danger">{{$message}}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
                    <input type="submit" class="btn btn-primary" value="Add">
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
