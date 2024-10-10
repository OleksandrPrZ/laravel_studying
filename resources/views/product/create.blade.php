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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
                        <textarea name="description" class="form-control" id="productDescription" placeholder="Description">
                            {{old('description')}}
                        </textarea>
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
                        <label>Tags</label>
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a Tags" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Colors</label>
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a Colors" style="width: 100%;">
                            @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>{{__('Choose category')}}</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    {{$category->id == old('category_id') ? 'selected' : ''}}>
                                    {{$category->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="imageInputFile">Upload image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="image" type="file" class="custom-file-input" id="imageInputFile">
                                <label class="custom-file-label" for="imageInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
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
