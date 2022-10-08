@extends('template.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <h3>{{ $post->title }}</h3>
                <div>
                    <a href="#">
                        <span class="badge bg-secondary">
                            {{ $post->category->title }}
                        </span>
                    </a>
                </div>
                <div class="text-center">
                    @if ($post->photos->count())
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($post->photos as $key => $photo)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <a class="venobox" data-gall="myGallery" href="{{ asset("storage/$photo->name") }}">
                                            <img src="{{ asset("storage/$photo->name") }}" class="rounded post-detail-img">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>
                <p class="my-3" style="white-space: pre-wrap;">{{ $post->description }}</p>
                <div class=" d-flex justify-content-between align-items-center">
                    <div>
                        <p class="mb-0">{{ $post->user->name }}</p>
                        <p class="mb-0">{{ $post->created_at->diffforHumans() }}</p>
                    </div>
                    <div>
                        @can('update', $post)
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-outline-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        @endcan
                        <a class="btn btn-primary" href="{{ route('page.index') }}">Back</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4">
                @include('template.sidebar')
                <div class="mb-3">
                    <h4>Recent Posts</h4>
                    <div class="list-group">
                        @foreach ($recent_posts as $recent_post)
                            <a href="{{ route('page.detail', $recent_post->slug) }}"
                                class="list-group-item list-group-item-action {{ route('page.detail',$recent_post->slug) === request()->url() ? 'active' : '' }}">
                                {{ $recent_post->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
