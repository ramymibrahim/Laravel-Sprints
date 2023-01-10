@extends('layouts.admin')
@section('content')
    <h2>Add Product</h2>
    <form method="POST" action="{{ url('admin/products') }}">
        @csrf
        <label>Name</label>
        <input class="form-control" name="name" value="{{ old('name') }}" />
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="form-control" name="image" value="{{ old('image') }}" />
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <select class="form-control" name="category_id">
            <option>Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{old('category_id')==$category['id']?'selected':''}}>{{ $category->name }}</option>
            @endforeach
        </select>

        <button class="btn btn-primary">Add</button>
        <a class="btn btn-secondary" href="{{ url('admin/products') }}">Cancel</a>
    </form>
@endsection
