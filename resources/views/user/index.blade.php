@extends('layouts.app')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User</li>
        </ol>
    </nav>
    <div class=" card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Users List</h4>
            <div>
                <form action="{{route('user.index')}}" method="GET">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Control</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @can('update',$user)
                                <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            @endcan
                            @can('delete',$user)
                                <form action="{{ route('user.destroy',$user->id) }}" method="POST" class=" d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>
                        <td>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-calendar"></i>
                                {{ $user->created_at->format("d M Y") }}
                            </p>
                            <p class="small mb-0 text-black-50">
                                <i class="bi bi-clock"></i>
                                {{ $user->created_at->format("h : m A") }}
                            </p>
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
            <div class="">
                {{ $users->onEachSide(1)->links() }}
            </div>
    </div>
@endsection
