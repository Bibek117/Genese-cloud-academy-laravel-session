<div class="search-bar-top">
    <div class="search-bar">
        @php
            $categories = categories_list();
        @endphp
        <form method="GET" action="{{ route('search') }}">
            <select name="category">
                <option selected="selected" value="">All Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>                
                @endforeach
            </select>
            <input name="search" value="{{request('search')}}" placeholder="Search Products Here....." type="search">
            <button class="btnn"><i class="ti-search"></i></button>
        </form>
    </div>
</div>