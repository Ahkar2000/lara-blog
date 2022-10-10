@extends('layouts.app')
@section('content')

<x-breadcrump :links="$links" />
<x-card>
    <x-slot:title>Create Post</x-slot:title>
    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input name="title" label="Post Title" />
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
        <x-input type="file" name="photos" label="Post Photos" multiple="true" />
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
            <x-input name="featured_image" label="Featured Image" type="file" />
            <div class="">
                <button class="btn btn-lg btn-primary">Add Post</button>
            </div>
        </div>
    </form>
</x-card>

@endsection