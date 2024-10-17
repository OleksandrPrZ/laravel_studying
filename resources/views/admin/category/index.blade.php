@extends('admin.layouts.main')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/admin/categories/categories.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Categories')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{__('Categories')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- Форма для додавання/редагування категорії -->
        <form id="category-form">
            <input type="hidden" id="category-id" name="category_id" value="">
            <div>
                <label for="category-name">Category Name:</label>
                <input type="text" id="category-name" name="name" required>
            </div>
            <div>
                <label for="parent-id">Parent Category:</label>
                <select id="parent-id" name="parent_id">
                    <option value="">None</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Save</button>
        </form>

        <!-- Дерево категорій -->
        <div class="dd" id="nestable">
            <ol class="dd-list">
                @foreach ($categories as $category)
                    @include('admin.category.partials.category_item', ['category' => $category])
                @endforeach
            </ol>
        </div>

        <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
