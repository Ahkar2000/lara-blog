@extends('layouts.app')
@section('content')

    <x-breadcrump :links="$links" />
    <x-card>
        <x-slot:title>Edit Post</x-slot:title>
        <form id="updateForm" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
        </form>
            <x-input name="title" label="Post Title" :default="$post->title" form="updateForm" />
            <div class="mb-3">
                <label for="category" class="form-label">Select Category</label>
                <select type="text" id="category" name="category" form="updateForm"
                    class="form-control @error('category')
                is-invalid
            @enderror">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category', $post->category) ? 'selected' : '' }}>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="mb-1 d-flex">
                    @foreach ($post->photos as $photo)
                        <div class="d-flex position-relative">
                            <img src="{{asset('storage/'.$photo->name)}}" height="100" class=" rounded">
                            <form action="{{route('photo.destroy',$photo->id)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
                <div>
                    <label for="photos" class="form-label">Post Photos</label>
                    <input type="file" id="photos" name="photos[]" multiple form="updateForm"
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
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Post Description</label>
                <textarea id="description" form="updateForm" value="{{ old('description') }}" name="description" rows="8"
                    class="form-control @error('description')
                is-invalid
            @enderror">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between align-items-end">
                <div class="">
                    @isset($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-100 mt-3" height="100">
                    @endisset
                    <div class="">
                        <label for="featured_image" class="form-label">Featured Image</label>
                        <input type="file" id="featured_image" name="featured_image" form="updateForm"
                            class="form-control @error('featured_image')
                        is-invalid
                    @enderror">
                        @error('featured_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-lg btn-primary" form="updateForm">Update Post</button>
                </div>
            </div>
        </form>
    </x-card>
@endsection
