@extends('layouts.app')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('post.index')}}">Post</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Post</li>
    </ol>
</nav>
<div class=" card">
    <div class="card-body">
        <h4>Create New Post</h4>
        <hr>
        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" id="title" value="{{ old('title') }}" name="title" 
                class="form-control @error('title')
                    is-invalid
                @enderror">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select type="text" id="category" name="category" 
                class="form-control @error('category')
                    is-invalid
                @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{$category->id == old('category') ? 'selected' : ''}}>{{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="photos" class="form-label">Post Photos</label>
                <input type="file" id="photos" name="photos[]" multiple
                class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror">
                @error('photos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                @error('photos.*')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Post Description</label>
                <textarea id="description" value="{{ old('description') }}" name="description" rows="8"
                class="form-control @error('description')
                    is-invalid
                @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="">
                    <label for="featured_image" class="form-label">Featured Image</label>
                    <input type="file" id="featured_image" name="featured_image" 
                    class="form-control @error('featured_image')
                        is-invalid
                    @enderror">
                    @error('featured_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-lg btn-primary">Add Post</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection