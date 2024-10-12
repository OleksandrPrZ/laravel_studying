@extends('admin.layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ isset($role) ? 'Edit Role' : 'Create Role' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST">
                @csrf
                @if(isset($role))
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $role->name ?? old('name') }}" required>
                </div>

                <button type="submit" class="btn btn-success">{{ isset($role) ? 'Update Role' : 'Create Role' }}</button>
            </form>
        </div>
    </div>
@endsection
