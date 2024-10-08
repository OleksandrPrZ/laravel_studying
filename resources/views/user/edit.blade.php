@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit User')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Edit User')}}</li>
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
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name ?? old('name')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Surname" value="{{$user->surname ?? old('surname')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" class="form-control" placeholder="Age" value="{{$user->age ?? old('age')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{$user->address ?? old('Address')}}">
                    </div>
                    <div class="form-group">
                        <select name="gender" class="custom-select form-control"  id="gender">
                            <option disabled selected>{{__('Gender')}}</option>
                            <option {{$user->gender == 1 || old('gender') == 1 ? ' selected' : ''}} value="1">Male</option>
                            <option {{$user->gender == 2 || old('gender') == 2 ? ' selected' : ''}} value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
