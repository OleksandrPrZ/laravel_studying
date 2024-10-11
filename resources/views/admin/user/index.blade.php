@extends('admin.layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Users')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Users')}}</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin.user.create')}}" class="btn btn-primary">{{__('Add new')}}</a>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Token</th>
                                    <th>Generate Token</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td><a href="{{route('admin.user.show', $user->id)}}">{{$user->name}}</a></td>
                                        <td>
                                            @if($user->tokens->isNotEmpty())
                                                <ul>
                                                    @foreach($user->tokens as $token)
                                                        <li>
                                                            {{ $token->name }} {{ $token->token }}
                                                            ({{ $token->created_at->format('Y-m-d H:i:s') }})
                                                        </li>
                                                        @if (session('realToken') && session('userId') == $user->id)
                                                            <li>
                                                                {{ __('Your Token for User ID ') }} {{ session()->pull('userId') }}: {{ session()->pull('realToken') }}
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{route('admin.generate.token')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                <input type="submit" class="btn btn-default" value="Generate Token">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection