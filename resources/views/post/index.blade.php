@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Post</li>
        </ol>
    </nav>
    <div class=" card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Post List</h4>
            <div>
                <form action="{{route('post.index')}}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="keyword" id="" required>
                        <button class="btn btn-secondary">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
            </div>
            <hr>
            <div class="d-flex">
                @if (request('keyword'))
                    <p>Search By : " {{ request('keyword') }} "</p>
                    <a href="{{ route('post.index') }}" class="ms-1">
                        <i class="bi bi-trash3-fill"></i>
                    </a>
                @endif
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        @if (Auth::user()->role != 'author')
                            <th>Owner</th>
                        @endif
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->category->title }}
                        </td>
                        @notAuthor
                            <td>
                                {{ $post->user->name }}
                            </td>
                        @endnotAuthor
                        <td class=" text-nowrap">
                            <a href="{{ route('post.show',$post->id) }}" class="btn btn-sm btn-outline-dark">
                                <i class="bi bi-info-circle"></i>
                            </a>
                            @can('update',$post)
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            @can('delete',$post)
                                @trash
                                    <form action="{{ route('post.destroy',[$post->id,"delete"=>"force"]) }}" method="POST" class=" d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form> 
                                    <form action="{{ route('post.destroy',[$post->id,"delete"=>"restore"]) }}" method="POST" class=" d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-recycle"></i>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('post.destroy',[$post->id,"delete"=>"soft"]) }}" method="POST" class=" d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>   
                                @endtrash                    
                            @endcan
                        </td>
                        <td class="text-nowrap">
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-calendar"></i>
                                {{ $post->created_at->format("d M Y") }}
                            </p>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-clock"></i>
                                {{ $post->created_at->format("h : m A") }}
                            </p>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">There is no result.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $posts->onEachSide(1)->links() }}
            </div>
    </div>
@endsection
