@extends('layouts.app')

@section('content')
<x-breadcrump />
<div class="card">
    <div class="card-body">
        Hello World! This is home.
        {{Auth::user()->isAuthor() ? 'yes' : 'no'}}
    </div>
</div>

@endsection
