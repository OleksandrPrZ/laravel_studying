@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Add Product')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Add Product')}}</li>
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
                <form action="{{ route('product.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="productName">Name</label>
                        <input type="text" name="name" class="form-control" id="productName" value="{{old('name')}}" placeholder="Name">
                        @error('name')
                        <div class="text-danger">111{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productSlug">Slug</label>
                        <input type="text" name="slug" class="form-control" id="productSlug" value="{{old('slug')}}" placeholder="Slug">
                        @error('slug')
                        <div class="text-danger">222{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Price</label>
                        <input type="text" name="price" class="form-control" id="productPrice" value="{{old('price')}}" placeholder="Price">
                        @error('price')
                        <div class="text-danger">333{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Description</label>
                        <input type="text" name="description" class="form-control" id="productDescription" value="{{old('description')}}" placeholder="Description">
                        @error('description')
                        <div class="text-danger">444{{ $message }}</div>
                        @enderror
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="productDescription">Image</label>--}}
{{--                        <input type="text" name="name" class="form-control" placeholder="Name">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="productPrice">Available</label>--}}
{{--                        <input type="text" name="price" class="form-control" id="productPrice" placeholder="Price">--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label for="productQuantity">Quantity</label>
                        <input type="text" name="quantity" class="form-control" id="productQuantity" value="{{old('quantity')}}" placeholder="Quantity">
                        @error('quantity')
                        <div class="text-danger">555{{ $message }}</div>
                        @enderror
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="productCatid">Category ID</label>--}}
{{--                        <input type="text" name="quantity" class="form-control" id="productQuantity" placeholder="Category Id">--}}
{{--                    </div>--}}


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Add">
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
