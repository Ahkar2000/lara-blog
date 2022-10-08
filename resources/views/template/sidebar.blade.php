<div>
    <div class="">
        <form class="mb-3" method="get">
            <div class="input-group">
                <input type="text" name="keyword" value="{{ request('keyword') }}" class="form-control">
                <button class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        @isset($category)
            <div class="d-flex justify-content-between align-items-center mb-3">
                <p>Filter By : {{ $category->title }}</p>
                <a href="{{ route('page.index') }}" class="btn  btn-outline-primary">See All</a>
            </div>
        @endisset
    </div>
</div>
<div class="mb-3">
    <h3>Category List</h3>
    <div class="list-group">
        <a href="{{ route('page.index') }}" class="list-group-item {{ route('page.index') === request()->url() ? 'active':'' }}">All Categories</a>
        @foreach ($categories as $category)
        <a href="{{ route('page.category', $category->slug) }}" class="list-group-item list-group-item list-group-item-action {{ route('page.category', $category->slug) === request()->url() ? 'active':'' }}">{{ $category->title }}</a>
        @endforeach
    </div>
</div>