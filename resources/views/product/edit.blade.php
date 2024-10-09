@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit Product')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Edit Product')}}</li>
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
                <form action="{{ route('product.update', $product->slug) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{$product->name ?? old('name')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{$product->slug ?? old('slug')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price ?? old('price')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Description" value="{{$product->description ?? old('description')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{$product->quantity ?? old('quantity')}}">
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
